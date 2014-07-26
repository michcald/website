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
        'class' => 'offer-success'
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
        'class' => 'offer-danger'
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
        'class' => 'offer-success'
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
        'class' => 'offer-success'
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
        'class' => 'offer-danger'
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
        'class' => 'offer-warning'
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

<ul class="nav nav-pills nav-justified">
    <li>
        <a class="btn btn-social" href="https://github.com/michcald" target="_blank" alt="Github" title="Github">
            <span class="fa fa-github fa-3x"></span>
            <h3>My Github</h3>
        </a>
    </li>
    <li>
        <a class="btn btn-social" href="https://bitbucket.org/michcald" target="_blank" alt="Bitbucket" title="Bitbucket">
            <span class="fa fa-bitbucket fa-3x"></span>
            <h3>My Bitbucket</h3>
        </a>
    </li>
</ul>

<hr />

<h2>
    Some of my projects
</h2>

<div class="row">
    <? foreach ($records as $record): ?>
    <div class="col-md-12">
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
