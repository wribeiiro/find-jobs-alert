# FIND-JOBS-ALERT 💼🔎📧

This project is based on the aggregation of jobs from some technology companies.
Check below, some companies avaliable in project

- [Globo](https://www.globo.com/)
- [Pagar.me](https://pagar.me/)
- [Picpay](https://picpay.com/site)
- [SoftExpert](https://www.softexpert.com/)

## Example of usage

```php
<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;

$softJobs = ReaderFactory::getClass('softexpert');

print_r($softJobs->readJobs());
```

## Result of jobs
```bash
Array
(
    [0] => App\Entities\Job Object
        (
            [jobName:App\Entities\Job:private] => Ejecutivo de Ventas
            [local:App\Entities\Job:private] => Ciudad de México, México
            [period:App\Entities\Job:private] => Full-time | Full-time
            [area:App\Entities\Job:private] =>
            [link:App\Entities\Job:private] => https://softexpert.hire.trakstar.com/jobs/fk0uipj/        )

    [1] => App\Entities\Job Object
        (
            [jobName:App\Entities\Job:private] => Account Manager
            [local:App\Entities\Job:private] => Orlando, USA
            [period:App\Entities\Job:private] => Full-time | Fully remote
            [area:App\Entities\Job:private] => Sales
            [link:App\Entities\Job:private] => https://softexpert.hire.trakstar.com/jobs/fk0uk85/        )

    [2] => App\Entities\Job Object
        (
            [jobName:App\Entities\Job:private] => Analista de Marketing de Produto
            [local:App\Entities\Job:private] => Joinville, Brasil
            [period:App\Entities\Job:private] => Full-time | Full-time
            [area:App\Entities\Job:private] => Marketing
            [link:App\Entities\Job:private] => https://softexpert.hire.trakstar.com/jobs/fk03ogi/        )

    [3] => App\Entities\Job Object
        (
            [jobName:App\Entities\Job:private] => Analista de Processos de Negócio
            [local:App\Entities\Job:private] => Joinville, Brasil
            [period:App\Entities\Job:private] => Full-time | Full-time
            [area:App\Entities\Job:private] => Consultoria
            [link:App\Entities\Job:private] => https://softexpert.hire.trakstar.com/jobs/fk03xzq/        )
)
```
