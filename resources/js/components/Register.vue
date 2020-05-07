<template>
	<div class="card-body">
		<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

			<div class="col-md-6">
				<input id="name" type="text" class="form-control" v-model="name" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

			<div class="col-md-6">
				<input id="email" type="email" class="form-control" v-model="email" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

			<div class="col-md-6">
				<input id="password" type="password" class="form-control" v-model="password" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

			<div class="col-md-6">
				<input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
			</div>
		</div>

		<div class="form-group row" v-if="!result">
			<div class="col-md-6">
				{{ message }}
			</span>
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary" @click="register">
					Register
				</button>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		mounted() {
			console.log('Register component mounted.')
		},
		data: function () {
			return {
				name: '',
				email: '',
				password: '',
				password_confirmation: '',
				result: true
			}
		},
		props: [
			'route'
		],
		methods: {
			register: function () {
				axios.post(this.route, {
					name: this.name,
					email: this.email,
					password: this.password,
					password_confirmation: this.password_confirmation
				}).then(response => {
					this.result = response.data.result;
					this.message = response.data.message;

					if (this.result) {
						document.location.href = response.data.route;
					}
				}).catch(error => {
					console.log(error);
				});
			}
		}
	}
</script>