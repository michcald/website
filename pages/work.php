<?
$records = array(
    array(
        'title' => 'Everlution software Ltd',
        'location' => 'London, UK',
        'start' => 'Oct 2013',
        'end' => 'Current',
        'position' => 'Senior Software Engineer, Lead Developer',
        'description' => 'Software development services for information-intensive companies.',
        'links' => array(
            array(
                'key' => 'Everlution Ltd',
                'value' => 'http://everlution.com'
            )
        ),
        'icon' => 'bg-info',
        'align' => 'left-aligned'
    ),
    array(
        'title' => 'Reply Ltd',
        'location' => 'London, UK',
        'start' => 'May 2013',
        'end' => 'Sep 2013',
        'position' => 'Consultant',
        'description' => 'Development of cloud based software using AWS and Oracle Public Cloud.',
        'links' => array(
            array(
                'key' => 'Reply Ltd',
                'value' => 'http://www.replyltd.co.uk/'
            )
        ),
        'icon' => 'bg-warning',
        'align' => 'right-aligned'
    ),
    array(
        'title' => 'University of California, Irvine',
        'location' => 'Irvine, California, USA',
        'start' => 'Aug 2012',
        'end' => 'Mar 2013',
        'position' => 'Software Engineer Researcher',
        'description' => 'Short term project in an international PhD students group regarding a branch of the HCI (Human-Computer Interaction) with a focus on: <strong>Distributed Software Development</strong> and <strong>Usability evaluation of software applications</strong>',
        'links' => array(
            array(
                'key' => 'UCI',
                'value' => 'http://www.uci.edu/'
            ),
            array(
                'key' => 'Donald Bren School of ICS',
                'value' => 'http://www.ics.uci.edu/'
            ),
            array(
                'key' => 'CRADL Group',
                'value' => 'http://cradl.ics.uci.edu/'
            ),
        ),
        'icon' => 'bg-secondary',
        'align' => 'left-aligned'
    ),
    array(
        'title' => 'Web Inventions',
        'location' => 'Italy',
        'start' => 'Nov 2009',
        'end' => 'Dec 2012',
        'position' => 'Founder - Software Engineer',
        'description' => 'Moving standalone applications over the cloud (on premise and AWS). Designing and developing REST backend platforms.',
        'links' => array(),
        'icon' => 'bg-success',
        'align' => 'right-aligned'
    ),
);
?>

<link href="pub/css/work.css" rel="stylesheet">

<div class="row">
    <div class="timeline-centered">
        <? foreach ($records as $record): ?>
	<article class="timeline-entry <?= $record['align'] ?>">
            <div class="timeline-entry-inner">
		<time class="timeline-time" datetime="">
                    <span><?= $record['end'] ?></span>
                    <span><?= $record['start'] ?></span>
                </time>
                <div class="timeline-icon <?= $record['icon'] ?>">
                    <i class="entypo-feather"></i>
		</div>
                <div class="timeline-label">
                    <h2>
                        <a href='#'><?= $record['title'] ?></a>
                    </h2>
                    <blockquote><small><?= $record['position'] ?></small></blockquote>
                    <p><?= $record['description'] ?></p>
                    <? if (count($record['links']) > 0): ?>
                    <br />
                    <ul>
                    <? foreach ($record['links'] as $link): ?>
                    <li>
                        <a href="<?= $link['value'] ?>">
                            <small><?= $link['key'] ?></small>
                        </a>
                    </li>
                    <? endforeach; ?>
                    </ul>
                    <? endif; ?>
		</div>
            </div>	
	</article>
        <? endforeach; ?>	
    </div>
</div>