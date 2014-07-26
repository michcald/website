<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?page=home">Michael Caldera</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<? if ($_GET['page'] == 'work'): ?> class="active"<? endif; ?>>
            <a href="?page=work">
                <span class="glyphicon glyphicon-briefcase"></span>
                Work
            </a>
        </li>
        <li<? if ($_GET['page'] == 'education'): ?> class="active"<? endif; ?>>
            <a href="?page=education">
                <span class="glyphicon glyphicon-road"></span>
                Education
            </a>
        </li>
        <li<? if ($_GET['page'] == 'opensource'): ?> class="active"<? endif; ?>>
            <a href="?page=opensource">
                <span class="glyphicon glyphicon-gift"></span>
                Open Source
            </a>
        </li>
        <li<? if ($_GET['page'] == 'skills'): ?> class="active"<? endif; ?>>
            <a href="?page=skills">
                <span class="glyphicon glyphicon-tags"></span>
                Skills
            </a>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>