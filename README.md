# Google Charts PHP

PHP DataTable for Google charts.

```php
<?php
$dataTable = new DataTable([
    Column::create(ColumnType::STRING())->setLabel('Month'),
    Column::create(ColumnType::NUMBER())->setLabel('Active Members'),
]);
$dataTable->addRows([
    ['July', 123],
    ['Aug', 221],
    ['Sep', 97],
]);

print json_encode($dataTable); // {"cols":[{"type":"string","label":"Month"},{"type":"number","label":"Active Members"}],"rows":[{"c":[{"v":"July"},{"v":123}]},{"c":[{"v":"Aug"},{"v":221}]},{"c":[{"v":"Sep"},{"v":97}]}]}
```
