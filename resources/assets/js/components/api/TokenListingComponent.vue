<template>
    <div class="card card-body mt-3">
        <h6 class="border-bottom border-gray pb-1 mb-3">
            My API tokens <small class="float-right"><a href="">API documentation</a></small>
        </h6>
        
        <div class="table-responsive">
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Service</th>
                        <th scope="col" class="border-top-0">Token</th>
                        <th scope="col" class="border-top-0">&nbsp;</th> <!-- Needed for the functions -->
                    </tr>
                </thead>

                <tbody v-if="tokens.length > 0"> <!-- User has api tokens -->
                    <tr v-for="token in tokens">
                        <td><strong>{{ token.id }}</strong></td>
                    </tr>
                </tbody>

                <tbody v-if="tokens.length === 0"> <!-- User has no api tokens -->
                    <tr>
                        <td colspan="4">
                            <i><small class="text-muted">No API keys are found for your account.</small></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                tokens: []
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>