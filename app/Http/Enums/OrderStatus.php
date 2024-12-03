<?php

namespace App;

enum OrderStatus: int 
{
   case PENDING = 0;
   case ACCEPTED = 1;
   case DECLINED = 2;

   public function label(): string 
   {
        return match($this) {
            self::PENDING => 'Na čekanju',
            self::ACCEPTED => 'Prihvaćeno',
            self::DECLINED => 'Odbijeno',
        };
   }
}
