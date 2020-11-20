<template>
    <div class="flex w-full mb-4 bg-white flex-wrap">
        <div class="flex w-full h-12 m-4">
            <div class="w-11/12 flex-none p-2">
                <h2 class="justify-start">Confirmacion de Pago</h2>
            </div>
        </div>
        <div class="w-full h-12">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="store">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        ID
                    </label>
                    <input type="text" v-model="create.id" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    <p class="text-red-400 mt-2" v-if="errors['input.id']">{{ errors['input.id'][0] }}</p>
                </div>

                <div class="mb-4 ">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Token
                    </label>
                    <input type="text" v-model="create.token" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-red-400 mt-2" v-if="errors['input.token']">{{ errors['input.token'][0] }}</p>
                </div>

                <div class="flex items-center justify-between w-3/12">
                    <button class=" w-11/12 bg-green hover:bg-green text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        <span v-if="creating">Creating..</span>
                        <span v-else>Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import CREATE_PAYMENT from "../../graphql/pay/pay.graphql";

export default {
name: "recharge",
    data() {
        return {
            create: {},
            errors: {},
            creating: false,
            has_file: false
        }
    },

    methods: {

        async store() {
            this.creating = true;

            await this.$apollo.mutate({
                mutation: CREATE_PAYMENT,
                variables: {
                    input:{
                        id: this.create.id,
                        token: this.create.token
                    }
                }
            })
                .then(() => {
                    this.creating = false;
                    location.reload();
                })
                .catch((error) => {
                    this.creating = false;

                    let { graphQLErrors } = error;

                    if (graphQLErrors[0].extensions.category === "validation") {
                        this.errors = graphQLErrors[0].extensions.validation;
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
