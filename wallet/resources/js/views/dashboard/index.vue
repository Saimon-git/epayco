<template>
    <div class="w-full mb-4 bg-white p-4">
        <h1 class="text-center mb-5">EndPoints</h1>
            <ul class="flex w-full ml-5 mr-5 border-solid border-b border-gray-300">
                <li class="w-2/12">
                    <a
                        href="/register-client"
                        class="inline-block py-2 px-4 text-black hover:text-gray-600 font-semibold"
                    >Registrar Cliente
                    </a>
                </li>
                <li class="w-2/12">
                    <a
                        class="inline-block py-2 px-4 text-black hover:text-gray-600 font-semibold"
                        href="/recharge-wallet"
                    >Recargar billetera</a>
                </li>
                <li class="w-2/12">
                    <a
                        class="inline-block py-2 px-4 text-black hover:text-gray-600 font-semibold"
                        href="/balance"
                    >Revisar saldo</a>
                </li>
                <li class="w-2/12">
                    <a
                        class="inline-block py-2 px-4 text-black hover:text-gray-600 font-semibold"
                        href="/generate-token"
                    >Generar token</a>
                </li>
                <li class="w-2/12">
                    <a
                        class="inline-block py-2 px-4 text-black hover:text-gray-600 font-semibold"
                        href="/confirmation-pay"
                    >Confirmar pago</a>
                </li>
            </ul>
    </div>
</template>

<script>
export default {
name: "index"
}
</script>

<style scoped>

</style>
