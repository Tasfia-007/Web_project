<?php

namespace App\Enums;
//table location r status

enum TableLocation: string{
  case Front = 'front';
  case Inside = 'inside';
  case Outside = 'outside';
}