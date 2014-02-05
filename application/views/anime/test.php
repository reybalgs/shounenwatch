<div class="container">
  <div class="starter-template">
    <h1>Anime list</h1>
    <?php foreach($animes as $anime): ?>
    <div class="row">
      <div class="col-xs-4">
        <img src="<?php echo base_url('static')?>/aa.jpg" class="img-responsive img-thumbnail"></img> 
      </div>
      <div class="col-xs-8">
            <h3>ID: <?php echo $anime['id']; ?></h3>
            <p><strong>Title:</strong> <?php echo $anime['name'] ?></p>
            <p><strong>Submitter: </strong> <?php echo $anime['username'] ?></p>
            <p><strong>Synopsis: </strong> <?php echo $anime['synopsis'] ?></p>
            <p><strong>Episodes:</strong> <?php echo $anime['episodes'] ?></p>
            <p><strong>Airing date:</strong> <?php echo $anime['airing'] ?></strong></p>
            </br>
      </div>
    </div>
    <?php endforeach ?>
    <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    <p>Bacon ipsum dolor sit amet venison pork ball tip meatball turducken. Tenderloin bacon prosciutto pastrami pancetta shank hamburger t-bone. Ribeye beef rump frankfurter capicola cow strip steak tongue. Kevin leberkas shoulder pork loin pork flank boudin shankle prosciutto hamburger capicola. Capicola porchetta prosciutto meatloaf corned beef swine bacon bresaola tail frankfurter pork rump boudin. Ball tip capicola pastrami leberkas bresaola, prosciutto ribeye pork tri-tip shankle ham swine t-bone biltong drumstick. Swine landjaeger kevin bacon kielbasa.</p>
    <p>Beef ribs sausage ball tip jerky ham. Pork loin short loin strip steak, tenderloin fatback turkey salami sausage. Shank ball tip turducken strip steak, jowl t-bone hamburger filet mignon pancetta pork chop. Bresaola bacon jerky pancetta doner sirloin. Kielbasa capicola bacon short loin ground round strip steak shank chicken venison meatball turducken prosciutto boudin. Venison prosciutto frankfurter bacon, ground round jerky fatback. Shankle kevin tail prosciutto short loin sirloin rump.</p>
    <p>Brisket venison drumstick frankfurter flank short loin, hamburger prosciutto porchetta chicken filet mignon sirloin bresaola. T-bone meatloaf ribeye turkey. Kevin turkey doner beef shoulder pastrami ribeye meatball prosciutto jowl tri-tip spare ribs hamburger biltong. Salami beef kielbasa swine, ribeye chicken filet mignon doner spare ribs rump prosciutto bresaola tongue shankle. Chuck venison bresaola ham. Meatloaf shankle shoulder biltong shank short ribs frankfurter tongue kielbasa meatball cow boudin ground round filet mignon.</p>
    <p>Pork belly ribeye drumstick pig sausage, meatball tri-tip. Chicken venison cow turducken. Ribeye shank swine shoulder fatback pancetta boudin short ribs cow ground round. Jerky strip steak brisket, tail turkey shoulder pork belly. Ham hock shankle beef meatloaf strip steak. Ribeye fatback pork chop cow kielbasa, chuck porchetta corned beef pork loin venison bacon t-bone frankfurter beef landjaeger.</p>
    <p>Hamburger meatball bacon sirloin cow turkey drumstick boudin chuck fatback jerky sausage venison flank. Tenderloin short loin short ribs, ground round drumstick ribeye brisket tri-tip bresaola beef beef ribs cow. Ham pig pork chop doner brisket strip steak kielbasa. Ball tip pastrami landjaeger, beef short ribs spare ribs porchetta pancetta short loin andouille. Pork belly pig hamburger ham tenderloin prosciutto filet mignon salami sirloin shank ribeye t-bone doner. Biltong swine tail, strip steak shoulder beef ribs capicola frankfurter pork meatloaf pork loin chicken.</p>
  </div>
</div>