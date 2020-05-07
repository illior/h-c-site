<template>
	<div class="card-body">
		<div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input type="text" class="form-control" v-model="email" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input type="password" class="form-control" v-model="password" required>
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
                <button type="submit" class="btn btn-primary" @click="login">
                    Login
                </button>
            </div>
        </div>
	</div>
</template>
<script type="text/javascript">
	export default {
        mounted() {
            console.log('Login component mounted.')
        },
        data: function() {
        	return {
        		email: '',
                password: '',
                message: '',
                result: true,
        	}
        },
        props: [
            'route'
        ],
        methods: {
            login: function () {
                axios.post(this.route, {
                    email: this.email,
                    password: this.password
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