<?php

/*
 * This file is part of the tmilos/google-charts package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tmilos\GoogleCharts\DataTable;

use Tmilos\Value\AbstractEnum;

/**
 * @method static ColumnType BOOL()
 * @method static ColumnType NUMBER()
 * @method static ColumnType STRING()
 * @method static ColumnType DATE()
 * @method static ColumnType DATETIME()
 * @method static ColumnType TIME__OF_DAY()
 */
class ColumnType extends AbstractEnum
{
    const BOOL = 'boolean';
    const NUMBER = 'number';
    const STRING = 'string';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const TIME__OF_DAY = 'timeofday';
}
