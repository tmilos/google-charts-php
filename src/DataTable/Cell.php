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

class Cell implements \JsonSerializable
{
    private $value;

    private $formatted;

    /**
     * @param $value
     * @param $formatted
     */
    public function __construct($value, $formatted = null)
    {
        $this->value = $value;
        $this->formatted = $formatted;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [
            'v' => $this->value,
        ];
        if ($this->formatted) {
            $result['f'] = $this->formatted;
        }

        return $result;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
