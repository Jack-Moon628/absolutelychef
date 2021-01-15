<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PackageTypeEnums extends Enum
{
    const ENTERPRISE =   '0';
    const PROFESSIONAL =   '1';
    const WAITING = '2';

}
