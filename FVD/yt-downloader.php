<?php
include "./app/GetVideoInfo.php";
include "./admin/connection.php";
$isvalid = "";
$isVideoIdValid = "";

if (isset($_POST['submit'])) {
  $video_link = $_POST['video_url'];
  if ($video_link != "") {
    $isVideoIdValid = preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_link, $match);
    if ($isVideoIdValid == "1") {
      $video_id =  $match[1];

      // getting video information
      $video = json_decode(GetVideoInfo($video_id));
      // print_r($video);
      if (isset($video->msg) && $video->msg == "error") {
        $isvalid = "";
        $isVideoIdValid = "";
        $er = "Internet connection Timed out!";
      } else {
        $isvalid = $video->playabilityStatus->status;

        $formats = $video->streamingData->formats;
        $thumbnails = $video->videoDetails->thumbnail->thumbnails;
        $title = $video->videoDetails->title;
        $short_description = $video->videoDetails->shortDescription;
        $channel_id = $video->videoDetails->channelId;
        $channel_name = $video->videoDetails->author;
        $views = $video->videoDetails->viewCount;
        $video_duration_in_seconds = $video->videoDetails->lengthSeconds;
        $thumbnail = end($thumbnails)->url;

        // seconds to minutes&hours
        $hours = floor($video_duration_in_seconds / 3600);
        $minutes = floor(($video_duration_in_seconds / 60) % 60);
        $seconds = $video_duration_in_seconds % 60;

        // Insert link to Database
        $currentDate = new DateTime();
        // Month day, year
        $date = $currentDate->format('F d, Y');
        // Insert link into Database
        $sql = "INSERT INTO `links`(`link`, `ldate`, `ltype`)VALUES('$video_link', '$date', 'yt') ";
        $run = mysqli_query($con, $sql);
        // if ($run) {
        //     echo "Link Inserted!\n";
        // }
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="./asset/style.css">
  <title>Video Downloader</title>
</head>

<body>
  <header>
    <div>
      <a href="./index.html">
        <h5>Facebook Video Downloader</h5>
      </a>
      <a href="./yt-downloader.php">
        <h5>YouTube Video Downloader</h5>
      </a>
    </div>
  </header>
  <div class="downloader">
    <h1 style="font-weight: 600;">YouTube Video Downloader</h1>
    <div class="main">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="video_url" placeholder="Paste Video URL..." autocomplete="off">
        <input type="submit" name="submit" value="search">
      </form>

      <?php
      if ($isVideoIdValid == "0") { ?>
        <div class="instruction_box">
          <label><i class='bx bx-unlink'></i></label>
          <h3>Entered url is invalid.</h3>
          <p>make sure url is valid.</p>
        </div>
      <?php } else if ($isvalid == "") { ?>
        <div class="instruction_box">
          <label><i class='bx bx-link'></i></label>
          <h3>Copy video url & paste here.</h3>
          <p>make sure url is valid.</p>
          <p style="color: red;"><?= @$er ?></p>
        </div>

      <?php } else if ($isvalid == "OK") { ?>

        <div class="video_detail_box">
          <div class="thumbnail_box">
            <img src="<?php echo $thumbnail; ?>" alt="thumbnail">
            <a href="./scripts/download_img.php?url=<?php echo $thumbnail; ?>&name=<?php echo $title; ?>" id="img_download_btn"><i class='bx bxs-download'></i></a>
            <a href="<?php echo $video_link; ?>" target="_blank" id="original_video_link_btn"><i class='bx bxl-youtube'></i></a>
          </div>

          <?php if (!empty($formats)) {

            if (@$formats[0]->url == "") { ?>
              <div class="instruction_box">
                <label><i class='bx bx-video-off'></i></label>
                <h3>Unsupported.</h3>
                <p>This video is currently unsupported.</p>
              </div>

            <?php } else { ?>

              <div class="text_info">
                <h4><?php echo $title; ?></h4>

                <div class="additional_info">
                  <a href="<?php echo 'https://www.youtube.com/channel/' . $channel_id ?>" target="_blank"><?php echo $channel_name ?></a>
                  <p><i class='bx bx-time-five'></i>&nbsp; <?php echo "$hours:$minutes:$seconds"; ?></p>
                  <p><i class='bx bx-show'></i>&nbsp; <?php echo $views; ?></p>
                </div>
                <table>

                  <tr>
                    <th>Quality</th>
                    <th>Format</th>
                    <th>Download</th>
                  </tr>

                  <?php foreach ($formats as $format) {

                    // getting all available video formats
                    if (@$format->url == "") {
                      $signature = "https://youtube.com?" . $format->signatureCipher;
                      parse_str(parse_url($signature, PHP_URL_QUERY), $parse_signature);
                      $url = $parse_signature['url'] . "&sig=" . $parse_signature['s'];
                    } else {
                      $url = $format->url;
                    }
                  ?>

                    <tr>
                      <td> <?php if ($format->qualityLabel) echo $format->qualityLabel;
                            else echo "Unknown"; ?>
                      </td>
                      <td><?php if ($format->mimeType) echo explode(";", explode("/", $format->mimeType)[1])[0];
                          else echo "Unknown"; ?>
                      </td>
                      <td><a href="./scripts/download_video.php?link=<?php echo urlencode($url) ?>&title=<?php echo urlencode($title) ?>&type=<?php if ($format->mimeType) echo explode(";", explode("/", $format->mimeType)[1])[0];
                                                                                                                                              else echo "mp4"; ?>" id="download_btn"><i class='bx bxs-download'></i>&nbsp;Download</a></td>
                    </tr>

                  <?php } ?>

                </table>

              </div>
        </div>

    <?php }
          }
        } else { ?>
    <div class="instruction_box">
      <label><i class='bx bx-video-off'></i></label>
      <h3>Unable to fetch video info.</h3>
      <p>make sure url is valid.</p>
    </div>
  <?php } ?>
    </div>
  </div>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>