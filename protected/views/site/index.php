
<div class="jcarousel">
    <ul>
<?php
        $carim = array(
                        array('name'=>'aqualeto1f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),
                        array('name'=>'aqualeto2f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),
                        array('name'=>'aqualeto3f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),
                        array('name'=>'aqualeto4f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),
                        array('name'=>'aqualeto5f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),
                        array('name'=>'aqualeto6f.jpg','link'=>'/index.php?r=site/public_interior&show=aqualeto'),

                        array('name'=>'arub1f.jpg','link'=>'/index.php?r=site/private_interior&show=arub'),
                        array('name'=>'arub2f.jpg','link'=>'/index.php?r=site/private_interior&show=arub'),
                        array('name'=>'arub3f.jpg','link'=>'/index.php?r=site/private_interior&show=arub'),
                        array('name'=>'arub4f.jpg','link'=>'/index.php?r=site/private_interior&show=arub'),
                        array('name'=>'arub5f.jpg','link'=>'/index.php?r=site/private_interior&show=arub'),

                        array('name'=>'hcred1f.jpg','link'=>'/index.php?r=site/public_interior&show=hcred'),
                        array('name'=>'hcred2f.jpg','link'=>'/index.php?r=site/public_interior&show=hcred'),
                        array('name'=>'hcred3f.jpg','link'=>'/index.php?r=site/public_interior&show=hcred'),
                        array('name'=>'hcred4f.jpg','link'=>'/index.php?r=site/public_interior&show=hcred'),
                        array('name'=>'hcred5f.jpg','link'=>'/index.php?r=site/public_interior&show=hcred'),

                        array('name'=>'homnet1f.jpg','link'=>'/index.php?r=site/public_interior&show=homnet'),
                        array('name'=>'homnet2f.jpg','link'=>'/index.php?r=site/public_interior&show=homnet'),
                        array('name'=>'homnet3f.jpg','link'=>'/index.php?r=site/public_interior&show=homnet'),
                        array('name'=>'homnet4f.jpg','link'=>'/index.php?r=site/public_interior&show=homnet'),
                        array('name'=>'homnet5f.jpg','link'=>'/index.php?r=site/public_interior&show=homnet'),

                        array('name'=>'kamatsu1f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu2f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu3f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu4f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu5f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu6f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),
                        array('name'=>'kamatsu7f.jpg','link'=>'/index.php?r=site/public_interior&show=kamatsu'),

                        array('name'=>'kasper1f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),
                        array('name'=>'kasper2f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),
                        array('name'=>'kasper3f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),
                        array('name'=>'kasper4f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),
                        array('name'=>'kasper5f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),
                        array('name'=>'kasper6f.jpg','link'=>'/index.php?r=site/public_interior&show=kasper'),

                        array('name'=>'ktyazh1f.jpg','link'=>'/index.php?r=site/private_interior&show=ktyazh'),
                        array('name'=>'ktyazh2f.jpg','link'=>'/index.php?r=site/private_interior&show=ktyazh'),
                        array('name'=>'ktyazh3f.jpg','link'=>'/index.php?r=site/private_interior&show=ktyazh'),
                        array('name'=>'ktyazh4f.jpg','link'=>'/index.php?r=site/private_interior&show=ktyazh'),
                        array('name'=>'ktyazh5f.jpg','link'=>'/index.php?r=site/private_interior&show=ktyazh'),

                        array('name'=>'rrg1f.jpg','link'=>'/index.php?r=site/public_interior&show=rrg'),
                        array('name'=>'rrg2f.jpg','link'=>'/index.php?r=site/public_interior&show=rrg'),
                        array('name'=>'rrg3f.jpg','link'=>'/index.php?r=site/public_interior&show=rrg'),
                        array('name'=>'rrg4f.jpg','link'=>'/index.php?r=site/public_interior&show=rrg'),

                        array('name'=>'yusupovo1f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),
                        array('name'=>'yusupovo2f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),
                        array('name'=>'yusupovo3f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),
                        array('name'=>'yusupovo4f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),
                        array('name'=>'yusupovo5f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),
                        array('name'=>'yusupovo6f.jpg','link'=>'/index.php?r=site/private_interior&show=yusupovo'),

                        array('name'=>'zykeevo1f.jpg','link'=>'/index.php?r=site/private_interior&show=zykeevo'),
                        array('name'=>'zykeevo2f.jpg','link'=>'/index.php?r=site/private_interior&show=zykeevo'),

                        array('name'=>'komsomol1f.jpg','link'=>'/index.php?r=site/public_interior&show=komsomol'),
                        array('name'=>'komsomol2f.jpg','link'=>'/index.php?r=site/public_interior&show=komsomol'),
                        array('name'=>'komsomol3f.jpg','link'=>'/index.php?r=site/public_interior&show=komsomol'),
                        array('name'=>'komsomol4f.jpg','link'=>'/index.php?r=site/public_interior&show=komsomol'),

                        array('name'=>'asev1f.jpg','link'=>'/index.php?r=site/private_interior&show=asev'),
                        array('name'=>'asev2f.jpg','link'=>'/index.php?r=site/private_interior&show=asev'),
                        array('name'=>'asev3f.jpg','link'=>'/index.php?r=site/private_interior&show=asev'),
                        array('name'=>'asev4f.jpg','link'=>'/index.php?r=site/private_interior&show=asev'),

                        array('name'=>'chulkovo1f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),
                        array('name'=>'chulkovo2f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),
                        array('name'=>'chulkovo3f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),
                        array('name'=>'chulkovo4f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),
                        array('name'=>'chulkovo5f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),
                        array('name'=>'chulkovo6f.jpg','link'=>'/index.php?r=site/projects&show=chulkovo'),

                        array('name'=>'acosv1f.jpg','link'=>'/index.php?r=site/private_interior&show=acosv'),
                        array('name'=>'acosv2f.jpg','link'=>'/index.php?r=site/private_interior&show=acosv'),
                        array('name'=>'acosv3f.jpg','link'=>'/index.php?r=site/private_interior&show=acosv'),

                       );

        shuffle($carim);
        //shuffle($carim);

        foreach( $carim as $img ){
            echo '<li><img class="" onclick="window.location.href=\''.$img['link'].'\';return false;" src="images/carousel/'.$img['name'].'" /></li>';
        }
?>
    </ul>
</div>
<script type="text/javascript">

    $('.jcarousel').on('jcarousel:targetin', 'li', function(event, carousel) {
        var img = this.firstChild;
        //$(img).addClass("shadow");
        if( img )
            $('.jcarousel').width(parseInt(img.width));
    });

    $('.jcarousel').jcarousel({
        visible: 1,
        scroll: 1,
        wrap: 'circular'
        }).jcarousel({
            animation: {
                duration: 600,
                easing:   'linear'
            }
        }).jcarouselAutoscroll({
            interval: 3000,
            target: '+=1',
            autostart: true
    });
</script>