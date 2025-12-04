<script setup>
import http from '@/services/http.js';
import { reactive, ref } from 'vue';
const email = ref('');
const password = ref('');
const errors = reactive({'errors': []});
function authenticate(){
    event.preventDefault();
    http.post('/autenticacao', new FormData(document.querySelector('form')))
        .then(response => {
            console.log(response);
            errors.errors = null;
        })
        .catch(error => {
               errors.errors = [];
            if(error.response.status === 401)
                alert("Email ou senha inválidos!");
            if(error.response.status === 422){
                errors.errors = error.response.data.errors;
            }
        });
}

</script>
<template>
    <div class=""> 
        <div class="card-login m-auto card bg-base-100 card-border border-base-300 card-sm overflow-hidden">
            <form v-on:submit="authenticate">
                <div class="border-base-300 border-b border-dashed">
                    <div class="flex items-center gap-2 p-4">
                        <div class="grow">
                            <div class="flex items-center gap-2 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-40">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"></path>
                                </svg>
                                Login
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body gap-4">
                    
                    <div class="flex flex-col gap-1">
                        <label class="input input-border flex max-w-none items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"></path>
                            </svg>
                            <input type="text" name="email" v-model="email" class="grow" placeholder="Usuário">
                        </label>
                        <div v-if="errors.errors.email" class="text-sm text-error">
                              {{ errors.errors.email[0] }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="input input-border flex max-w-none items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                                <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd"></path>
                            </svg>
                            <input type="password" name="password" v-model="password" class="grow" placeholder="Senha">
                        </label>
                        <div v-if="errors.errors.password" class="text-sm text-error">
                              {{ errors.errors.password[0] }}
                        </div>
                    </div>
                    <div class="card-actions items-center gap-6">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped>
.card-login {
    width: 24rem;
}
</style>