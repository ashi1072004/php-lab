<?php

declare(strict_types=1);
class UserProfile
{
    public function __construct(private string $name, private string $phone)
    {
    }
    public function changePhone(string $phone)
    {
        $this->phone = $phone;
    }
}
class User
{
    private readonly string $username;
    private readonly UserProfile $profile;
    public function __construct(string $username)
    {
        $this->username = $username;
    }
    public function setProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }
    public function profile(): UserProfile
    {
        return $this->profile;
    }
}
$user = new User('Safi');
$user->setProfile(new UserProfile("Safina Shahzadi", "0786762564"));
$user->profile()->changePhone("9832759345");
var_dump($user->profile());
