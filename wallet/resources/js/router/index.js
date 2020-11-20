import VueRouterMultiguard from 'vue-router-multiguard';

import RegisterClient from "../views/register";
import RechargeWallet from '../views/wallet/recharge';

import BalanceWallet from "../views/wallet/balance";
import Token from "../views/token/index";

import ConfirmationPay from "../views/pay";


import VueRouter from "vue-router";


const routes = [
    {
        path: '/register-client',
        component: RegisterClient
    },
    {
        path: '/recharge-wallet',
        component: RechargeWallet
    },

    {
        path: '/balance',
        component: BalanceWallet
    },

    {
         path: '/generate-token',
         component: Token
     },

    {
         path: '/confirmation-pay',
         component: ConfirmationPay
     },

];

export default new VueRouter({
    mode: 'history',
    routes
});
