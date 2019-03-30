<template id="leads">
  <div class="colorlib-work">
					<div class="colorlib-narrow-content">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Categories</span>
								<h2 class="colorlib-heading animate-box">Leads</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 animate-box" data-animate-effect="fadeInLeft" v-for="lead in leads" :key="lead.personId">
								<router-link :to="lead.link.toLowerCase()">
								<div class="project" :style="lead.img">
									<div class="desc">
										<div class="con">
											<h3><a>{{lead.person}}</a></h3>
											<span>{{lead.category.toUpperCase()}}</span>
											<p class="icon">
												<span><i class="icon-heart"></i> {{lead.likes}}</span>
											</p>
										</div>
									</div>
								</div>
								</router-link>
							</div>
						</div>
					</div>
				</div>
</template>