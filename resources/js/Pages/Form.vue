<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { Head, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

const form = useForm({
    id: '',
    first_name: '',
    last_name: '',
    date_of_birth: '',
    email: '',
    phone_number: '',
    tax_id_code: '',
})

const errors = ref({})

function submitForm() {
    form.post(route('form.store'), {
        onError: response => {
            errors.value = response
        },
    })
}

</script>

<template>
    <Head title="My Form FE" />
    <div class="p-4 mx-auto mt-8 bg-white rounded-xl max-w-7xl">
        <h1 class="py-2 mb-4 font-bold border-b-4">My Form FE</h1>
        <form @submit.prevent="submitForm">
            <div class="grid grid-cols-2 gap-4">
                <div class="py-2">
                    <InputLabel class="mb-2" value="Nome"></InputLabel>
                    <TextInput class="w-full" v-model="form.first_name" required />
                    <template v-if="errors.first_name">
                        <InputError :message="errors.first_name" />
                    </template>
                </div>
                <div class="py-2">
                    <InputLabel class="mb-2" value="Cognome"></InputLabel>
                    <TextInput class="w-full" v-model="form.last_name" required />
                    <template v-if="errors.last_name">
                        <InputError :message="errors.last_name" />
                    </template>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="py-2">
                    <InputLabel class="mb-2" value="Data di nascita"></InputLabel>
                    <TextInput type="date" class="w-full" v-model="form.date_of_birth" required />
                    <template v-if="errors.date_of_birth">
                        <InputError :message="errors.date_of_birth" />
                    </template>
                </div>
                <div class="py-2">
                    <InputLabel class="mb-2" value="Email"></InputLabel>
                    <TextInput class="w-full" v-model="form.email" required />
                    <template v-if="errors.email">
                        <InputError :message="errors.email" />
                    </template>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="py-2">
                    <InputLabel class="mb-2" value="Numero di telefono"></InputLabel>
                    <TextInput class="w-full" v-model="form.phone_number" required />
                    <template v-if="errors.phone_number">
                        <InputError :message="errors.phone_number" />
                    </template>
                </div>
                <div class="py-2">
                    <InputLabel class="mb-2" value="Codice Fiscale"></InputLabel>
                    <TextInput class="w-full" v-model="form.tax_id_code" required />
                    <template v-if="errors.tax_id_code">
                        <InputError :message="errors.tax_id_code" />
                    </template>
                </div>
            </div>
            <div class="flex justify-end py-2">
                <PrimaryButton class="mr-4" @click="submitForm">Salva</PrimaryButton>
            </div>
        </form>
    </div>
</template>
