<?php

namespace App\Http\Enums;

enum PermissionEnum: int 
{
   case USER = 0;
   case COURIER = 1;
   case RESTARUANT = 3;
   case SUPER_ADMIN = 4;

   public function label(): string 
   {
        return match($this) {
            self::USER => 'Korisnik',
            self::COURIER => 'Dostavljač',
            self::RESTARUANT => 'Restoran',
            self::SUPER_ADMIN => 'SuperAdmin'
        };
   }
}
