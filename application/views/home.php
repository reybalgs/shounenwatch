<div class="jumbotron" id="jumbotron-torgue" style="background: #888888 url('http://dummyimage.com/1366x768/111/ffffff') repeat center center; min-height: 200px">
        <h1 class="text-center" style="color: #ffffff; text-shadow: 2px 2px 8px #010101; padding-top: 260px" >The smart shounen tracker</h1>
        <p class="text-center" style="color: #ffffff; text-shadow: 2px 2px 8px #010101">For the fans of the hard and badass shounen genre.</p>
        <p class="text-center"><a href="<?php echo site_url('user') ?>" id="explosion-btn" class="btn btn-danger btn-lg" role="button">Get started!</a></p>
        <script>
            // Script that changes the jumbotron image when the button is pressed
            var button = $("#explosion-btn");
            var jumbotron = $("#jumbotron-torgue");
            
            // Set an event listener for the button
            button.click(function() {
                console.log("Explosions!?");
                jumbotron.attr("style", "background: #ffffff url('<?php echo base_url('')?>static/torgue_explosion.jpg') repeat center center; min-height: 200px");
            });
        </script>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>What is ShounenWatch?</h1>
            <p><strong>ShounenWatch</strong> is the best thing since sliced bread! And explosions! It's a site where people submit badass shounen anime. <i>Shounen</i> anime are anime for real men!</p>
            <p>Here's what you can do with ShounenWatch:</p>
            <ul>
                <li>Be a badass</li>
                <li>Submit shounen anime</li>
                <li>Be a badass</li>
                <li>Track your currently watching episodes on shounen anime</li>
                <li>Be a badass</li>
                <li>Rate shounen anime submitted by other badasses</li>
                <li><strong>BE A BADASS</strong></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Where do I sign up?</h3>
            <p>You've come to the right place! If you're willing to be badass, just click the button up there, and register for an account!</p>
        </div>
    </div>
</div>
