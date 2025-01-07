<?php 
namespace App\Contracts;

interface AdminInterface
{
    public function createAccountWithRole(array $data);
    public function deleteAccount(int $userId);
    public function viewSensitiveData();
}