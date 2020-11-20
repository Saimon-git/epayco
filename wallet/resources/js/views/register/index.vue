<template>
    <div class="flex w-full mb-4 bg-white flex-wrap">
        <div class="flex w-full h-12 m-4">
            <div class="w-11/12 flex-none p-2">
                <h2 class="justify-start">Registrar Cliente</h2>
            </div>
        </div>
        <div class="w-full h-12">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="store">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre
                    </label>
                    <input type="text" v-model="create.name" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                    <p class="text-red-400 mt-2" v-if="errors['input.name']">{{ errors['input.name'][0] }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Identificacion
                    </label>
                    <input type="text" v-model="create.identification" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-red-400 mt-2" v-if="errors['input.identification']">{{ errors['input.identification'][0] }}</p>
                </div>


                <div class="mb-4 ">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Telefono
                        </label>
                        <input type="text" v-model="create.phone" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-red-400 mt-2" v-if="errors['input.phone']">{{ errors['input.phone'][0] }}</p>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Email
                    </label>
                    <input type="email" v-model="create.email" class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-red-400 mt-2" v-if="errors['input.email']">{{ errors['input.email'][0] }}</p>
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
import CREATE_CLIENT from "../../graphql/clients/create_client.graphql";
export default {
name: "index",
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
            if (this.create.email != null) {
                if (!this.validEmail(this.create.email)) {
                    let error = [];
                    error['input.email'] = [
                        'The E-mail field is invalid.'
                    ];
                    this.errors = error;
                    return;
                }
            }
            this.creating = true;

            await this.$apollo.mutate({
                mutation: CREATE_CLIENT,
                variables: {
                    input:{
                        email: this.create.email,
                        phone: this.create.phone,
                        name: this.create.name,
                        identification: this.create.identification
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
        },

        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    }
}
</script>

<style scoped>

</style>
