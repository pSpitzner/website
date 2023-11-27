---
date: 2022-06-09
last_edit: 2023-11-23
---

# Stimulating Cultures

As of last week, I have a new [preprint on arXiv](https://arxiv.org/abs/2205.10563)
(edit: out now in [Science Advances](https://doi.org/10.1126/sciadv.ade1755)).

First of all, I want to thank the amazing team who worked on this project, especially Hideaki, Johannes and Jordi who had to endure `grumpy me` during countless group meetings (and a bunch of extra ones). Seriously, thanks guys!

## Brains are modular and cultures should be, too!

When presenting this in talks, I start by explaining that it would be cool to have neuronal cultures that well represent the living brain.
However, as most of you probably know, cultures do their own thing and tend to be bursty---where occasional, rather short and synchronous events of high activity (bursts) take turns with extended episodes of silence.
In 2018, Hideaki and his lab managed to [limit these bursts](http://advances.sciencemag.org/content/4/11/eaau4914) (which usually light up the whole system) to sub-parts of the culture.
They achieved this by making the topology of the cultures modular, effectively making it harder for a local burst to propagate to other modules.
Thus, the effect was strongest when modules were at the brink of being disconnected from one another.
Although individual modules still show the burst-like dynamics, the dynamics of the whole system are less synchronized, getting much closer to real-brain dynamics.

## Brains are busy places.

Looking for another aspect that real brains have and cultures lack, we started to consider [background noise](https://link.aps.org/doi/10.1103/PhysRevX.8.031018).
Think of it: Brains are constantly exposed to sensory stimuli, which tend to make their way into the dynamics one way or another, leading to an omnipresent (noisy) baseline activity of all neurons.
On the other hand, cultures sit around in a glass dish, and although they perceive more of their environment than we usually expect, they do not have much to do.
Hence, in this work we stimulated the cultures in a random and asynchronous manner.
Adding such an asynchronous input reduced synchrony further than modularity alone.

We then used simulations of LIF-Neurons (using the awesome [Brian2 simulator](https://github.com/brian-team/brian2)) and developed a minimal, mean-field like model to explain the reduced synchrony under stimulation. We found that the noisy input that makes neurons fire sporadically depletes the average synaptic resources in modules.
This can best be seen when considering module-level trajectories in the Rate-Resource plane, as you can see on the right-hand side in the clip below.
For long times, when no module-level burst occurs, resources recover and firing-rates are low.
Once charged enough, a burst occurs and resources discharge rapidly as the modules' neurons fire at high rate.

<video class="img-dyn w-col-11 center my-3" controls playsinline loop>
  <source src="./media/simulation_combined_fast.mp4" type="video/mp4">
This is a clip showing the dynamics in simulations, but your browser does not support the video tag.
</video>

As you might guess from the clip, the noisy input does not only deplete the average amount of synaptic resources, it also lowers the minimum amount of resources needed to start module-level bursts (increasing their frequency).
Now, due to the inhomogeneous degree distributions that are caused by the modular architecture (few axons connect across modules, but many axons connect within) the input-driven resource depletion affects the activations across modules more than within. Thus, module-level bursts persist but system-wide synchronization is reduced.

## Links
* [Our paper in Science Advances](https://doi.org/10.1126/sciadv.ade1755)
* [The Preprint on arXiv](https://arxiv.org/abs/2205.10563)
* [Yamamoto et al.,](http://advances.sciencemag.org/content/4/11/eaau4914) _Impact of modular organization on dynamical richness in cortical networks_
* [Zierenberg et al.,](https://link.aps.org/doi/10.1103/PhysRevX.8.031018) _Homeostatic Plasticity and External Input Shape Neural Network Dynamics_
* [Brian2,](https://github.com/brian-team/brian2) _A clock-driven simulator for spiking neural networks_
* [Github](https://github.com/Priesemann-Group/stimulating_modular_cultures) has all my code for simulations, analysis, plotting, and movie rendering
