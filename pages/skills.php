<link href="pub/css/skills.css" rel="stylesheet">

<?
$langs = array(
    array(
        'percentage' => 90,
        'label' => 'PHP',
        'class' => 'success'
    ),
    array(
        'percentage' => 80,
        'label' => 'Javascript',
        'class' => 'primary'
    ),
    array(
        'percentage' => 80,
        'label' => 'C/C++',
        'class' => 'danger'
    ),
    array(
        'percentage' => 70,
        'label' => 'Java',
        'class' => 'warning'
    ),
    array(
        'percentage' => 40,
        'label' => 'Python',
        'class' => 'default'
    ),
);
?>

<div class="col-md-3"></div>

<div class="col-md-6">
    <h2>Programming Languages</h2>
    <br />
    <div class="row">
        <? foreach ($langs as $l): ?>
        <div class="progress">
            <div class="progress-bar progress-bar-<?= $l['class'] ?>" role="progressbar" aria-valuenow="<?= $l['percentage'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $l['percentage'] ?>%;">
                <span class="sr-only">
                    <?= $l['percentage'] ?>% Complete
                </span>
            </div>
            <span class="progress-type">
                <?= $l['label'] ?>
            </span>
            <span class="progress-completed">
                <?= $l['percentage'] ?>%
            </span>
        </div>
        <? endforeach; ?>
    </div>
</div>

<div class="col-md-3"></div>

<div class="col-md-6">
    <h2>Databases</h2>
    <h5>Relational Databases</h5>
    <ul>
        <li>MySQL</li>
        <li>SQLite</li>
    </ul>
    <h5>NoSQL Databases</h5>
    <ul>
        <li>Elasticsearch</li>
        <li>MongoDB</li>
        <li>Neo4J</li>
    </ul>
</div>

<div class="col-md-6">
    <h2>Frameworks</h2>
    <ul>
        <li>Symfony2</li>
        <li>Zend Framework 2</li>
        <li>PHPUnit</li>
    </ul>
</div>

<div class="col-md-6">
    <h2>Dev ops</h2>
    <ul>
        <li>Salt stack</li>
        <li>Capistrano</li>
        <li>Capifony</li>
    </ul>
</div>

<div class="col-md-6">
    <h2>Other</h2>
    <ul>
        <li>Redis</li>
        <li>Beanstalkd</li>
    </ul>
</div>
