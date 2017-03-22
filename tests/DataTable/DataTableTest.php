<?php

/*
 * This file is part of the tmilos/google-charts package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests\Tmilos\GoogleCharts\DataTable;

use PHPUnit\Framework\TestCase;
use Tmilos\GoogleCharts\DataTable\Column;
use Tmilos\GoogleCharts\DataTable\ColumnType;
use Tmilos\GoogleCharts\DataTable\DataTable;

class DataTableTest extends TestCase
{
    public function test_json_serialize()
    {
        $dataTable = new DataTable([
            Column::create(ColumnType::STRING())->setLabel('Month'),
            Column::create(ColumnType::NUMBER())->setLabel('Active Members'),
        ]);
        $dataTable->addRows([
            ['July', 123],
            ['Aug', 221],
            ['Sep', 97],
        ]);

        $json = json_encode($dataTable, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $expected = <<<EOT
{
    "cols": [
        {
            "type": "string",
            "label": "Month"
        },
        {
            "type": "number",
            "label": "Active Members"
        }
    ],
    "rows": [
        {
            "c": [
                {
                    "v": "July"
                },
                {
                    "v": 123
                }
            ]
        },
        {
            "c": [
                {
                    "v": "Aug"
                },
                {
                    "v": 221
                }
            ]
        },
        {
            "c": [
                {
                    "v": "Sep"
                },
                {
                    "v": 97
                }
            ]
        }
    ]
}
EOT;

        self::assertEquals($expected, $json);
    }
}
