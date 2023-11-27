<!doctype html>
<html lang="en">

<head>
    <title>Paul's Research</title>
</head>
<?php
include "main/php/_pre.php";
?>

<!-- content -->
<div id="content-projects" class="content animate">

    <h1>On dynamics, topology, self-organization and all</h1>

    <p>Two of the things that have fascinated me since the first days of my studies are phase transitions and complex systems. As it turns out, with our brain we carry some 1.3kg of a pretty complex system around in our heads, which, presumably, operates near a phase transition, <em> and self-organizes towards this point.</em></p>

    <h2 class="pt-4">Self-organization in neuronal systems</h2>

    <p>
        People say self-organization whenever something interesting happens on a large scale due to mechanisms that take place on a smaller scale — but no-one <em>quite</em> understands how.
        My favourite example for this are neural dynamics; we know about the small-scale dynamics (individual neurons communicate with each other by emitting action potentials) and the large-scale dynamics (the combined population of neurons shows rich dynamic states).
        We also know that the dynamics on these two scales depend on the topology of the network (and, at the same time, change this very topology through plasticity), but countless intermediate details and mechanisms are yet to be understood.
    </p>
    <p>
        Some of these mechanisms I investigated during my PhD in <a href="https://priesemann-group.github.io/">Viola Priesemann's group.</a>

        In particular, I studied neuronal cultures to look at how an external input can shape the dynamics of the network.
        I then used simplified models of spiking neurons and numeric simulations to build a bottom-up understanding of the interplay between topology and input, which together shape the large-scale dynamics.
        The top-down perspective came from experiments of simple <em>modular</em> cultures that feature a bit of clustering, which we found to be a key ingredient to tune the dynamics away from the typically synchronized, all-or-nothing bursts.
        Together, this stresses the importance of structural inhomogeneities in the network,
        and hints that background input (even in the absence of sensory stimuli) is relevant for the formation of healthy brain dynamics.
    </p>

    <p>
        For more details, check my
        <a href="./blog/2022-06-09_stimulating_cultures">blog post</a>
        or the
        <a href="https://doi.org/10.1126/sciadv.ade1755">paper!</a>
    </p>

    <h2 class="pt-4">COVID-19 and the dynamics of disease spread</h2>


    <p>
        With the outbreak of COVID-19 in Germany, the focus in the group shifted a bit.
        Initially, like everyone else, we wanted to evaluate the effectiveness of political interventions and to come up with forecast-scenarios.
        Coincidentally,
        <a href="https://www.jdehning.com/">Jonas</a> and
        <a href="https://zierenberg.github.io/">Johannes</a>
        had started using Bayesian inference on neuro-data shortly before, so that we had the perfect tool ready to get <a href="https://science.sciencemag.org/content/369/6500/eabb9789">quick results.</a>
    </p>

    <p>
        Since then, I have been working on a number of papers on the spreading dynamics of diseases.
        For example, in one of my favourite projects, we analysed real-world contact data from the Copenhagen university campus and quantified how contact patterns interfere with disease spread.
        This work started from the simple intuition that you wont infect anyone if you don't have many contacts while you are infectious.
        And indeed, we found such <em>resonance effects</em>, which destabilize epidemic outbreaks and modulate the basic reproduction number.
        Apart from implications for epidemic models (which often neglect contact patterns),
        our results can advice future non-pharmaceutical interventions.
    </p>

    <p>
        Check the <a href="https://dx.doi.org/10.1088/1367-2630/acd1a7">publication</a> for all the details.
    </p>
    <div class="pb-5"></div>

    <?php

    // include __DIR__ . "/blog/utility.php";

    // echo "<div class='markdown'>";
    // echo renderPostFromMarkdown("main/md_content/research_intro.md");
    // echo renderPostFromMarkdown("main/md_content/research_2019_coarsesampling.md");
    // echo renderPostFromMarkdown("main/md_content/research_2018_mre.md");
    // echo renderPostFromMarkdown("main/md_content/research_2015_atmoweb.md");
    // echo "</div>";
    ?>

</div> <!-- content -->

<?php
include "main/php/_post.php";
?>

</html>
