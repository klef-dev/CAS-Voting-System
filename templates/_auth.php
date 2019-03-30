<!-- LOGIN TEMPLATE -->
<template id="login">
  <div class="colorlib-contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Authentication</span>
							<h2 class="colorlib-heading">Login</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-like"></i>
								</div>
								<div class="colorlib-text">
									<p>You can only vote once per category</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-data"></i>
								</div>
								<div class="colorlib-text">
									<p>Only Landmark Univeristy Registration Numbers allowed</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-lock3"></i>
								</div>
								<div class="colorlib-text">
									<p>Don't just try to hack anything... You are just decieving yourself</p>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="POST">
										<div class="form-group">
											<input v-model="reg_no" autofocus="autofocus" required="required" minlength="6" maxlength="7" type="text" class="form-control" placeholder="Reg No: 1700172">
										</div>
										<div class="form-group">
											<input v-model="password" type="password" required="required" class="form-control" placeholder="Password">
										</div>
										<div class="form-group">
											<button @click="Login" class="btn btn-primary btn-send-message" v-html="login"></button>
										</div>
										<span>Login as <router-link to="/nominate">Admin</router-link></span>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</template>

<!-- SIGNUP TEMPLATE -->
<template id="signup">
  <div class="colorlib-contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Authentication</span>
							<h2 class="colorlib-heading">Signup</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-like"></i>
								</div>
								<div class="colorlib-text">
									<p>You can only vote once per category</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-data"></i>
								</div>
								<div class="colorlib-text">
									<p>Only Landmark Univeristy Registration Numbers allowed</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-lock3"></i>
								</div>
								<div class="colorlib-text">
									<p>Don't just try to hack anything... You are just decieving yourself</p>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="POST">
										<div class="form-group">
											<input v-model="reg_no" autofocus="autofocus" required="required" minlength="6" maxlength="7" type="text" class="form-control" placeholder="Reg No: 1700172">
										</div>
										<div class="form-group">
											<input v-model="password" type="password" required="required" class="form-control" placeholder="Password">
										</div>
										<div class="form-group">
											<button @click="Signup" class="btn btn-primary btn-send-message" v-html="signup"></button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
</template>
