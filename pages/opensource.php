<link href="pub/css/opensource.css" rel="stylesheet">

<?
$records = array(
    array(
        'label' => 'PHP',
        'title' => 'OpenSimulator API',
        'description' => 'The API of the famous open source 3D Virtual World platform. Developed for University of California, Irvine.',
        'links' => array(
            array(
                'key' => 'OpenSimulator',
                'value' => 'http://opensimulator.org/'
            ),
            array(
                'key' => 'Github',
                'value' => 'https://github.com/michcald/opensimulatorapi'
            ),
        ),
        'class' => 'offer-default'
    ),
    array(
        'label' => 'JS',
        'title' => 'WYSIWYG Editor',
        'description' => 'A cross-browser What You See Is What You Get HTML editor written in Javascript.',
        'links' => array(
            array(
                'key' => 'Bitbucket',
                'value' => 'https://bitbucket.org/michcald/wysiwyg-html-editor'
            ),
        ),
        'class' => 'offer-primary'
    ),
    array(
        'label' => 'PHP',
        'title' => 'REST client',
        'description' => 'A general purpose REST library client for handling HTTP calls.',
        'links' => array(
            array(
                'key' => 'Github',
                'value' => 'https://github.com/michcald/rest-client'
            ),
        ),
        'class' => 'offer-success'
    ),
    array(
        'label' => 'PHP',
        'title' => 'MVC Framework',
        'description' => 'A general purpose MVC Framework.',
        'links' => array(
            array(
                'key' => 'Github',
                'value' => 'https://github.com/michcald/mvc'
            ),
        ),
        'class' => 'offer-warning'
    ),
    array(
        'label' => 'PHP',
        'title' => 'INspect-Web',
        'description' => 'A Web Application built on the top of the OpenSimulator API for the automatic creation of Virtual Worlds in order to help a HCI (Human-Computer Interaction) research about Distributed Usability Evaluation and Learning in Virtual Worlds.',
        'links' => array(
            array(
                'key' => 'INspect-World',
                'value' => 'http://www.ben-koehne.com/research.html'
            ),
            array(
                'key' => 'Github',
                'value' => 'https://github.com/michcald/inspectweb'
            ),
        ),
        'class' => 'offer-danger'
    ),
    array(
        'label' => 'JS',
        'title' => 'Local Storage Wrapper',
        'description' => 'A javascript library for interacting with the browser local storage.',
        'links' => array(
            array(
                'key' => 'Github',
                'value' => 'https://github.com/michcald/local-storage-wrapper'
            ),
        ),
        'class' => 'offer-primary'
    ),
    array(
        'label' => 'C',
        'title' => 'Compiler',
        'description' => 'A compiler written in C of an academic language.',
        'links' => array(
            array(
                'key' => 'Bitbucket',
                'value' => 'https://bitbucket.org/michcald/table-compiler'
            ),
        ),
        'class' => 'offer-danger'
    ),
    array(
        'label' => 'PHP',
        'title' => 'AIA Make Report',
        'description' => 'A Web Application very used by Italian Football Referees in order to compile, generate and send a PDF report of the matches to the sports court. AIA stays for Associazione Italiana Arbitri, which is the Italian Referees Association.',
        'links' => array(
            array(
                'key' => 'Bitbucket',
                'value' => 'https://bitbucket.org/michcald/aia-make-report'
            ),
        ),
        'class' => 'offer-success'
    ),
);

?>

<div class="container">
    <h3>
        All of my projects on my github and bitbucket accounts
    </h3>
    <div class="col-xs-6 col-md-3">
        <a href="https://github.com/michcald" class="thumbnail" target="_blank">
            <img src="pub/img/github.jpeg" />
        </a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="https://bitbucket.org/michcald" class="thumbnail" target="_blank">
            <img src="pub/img/bitbucket.png" />
        </a>
    </div>
</div>

<hr />

<div class="row">
    <? foreach ($records as $record): ?>
    <div class="col-xs-12 col-sm-7 col-md-5 col-lg-4">
        <div class="offer <?= $record['class'] ?>">
            <div class="shape">
                <div class="shape-text">
                        <?= $record['label'] ?>								
                </div>
            </div>
            <div class="offer-content">
                <h3 class="lead">
                    <?= $record['title'] ?>
                </h3>
                <p>
                    <?= $record['description'] ?>
                </p>
                <ul>
                    <? foreach ($record['links'] as $link): ?>
                    <li>
                        <a href="<?= $link['value'] ?>" target="_blank">
                            <?= $link['key'] ?>
                        </a>
                    </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <? endforeach; ?>
</div>
