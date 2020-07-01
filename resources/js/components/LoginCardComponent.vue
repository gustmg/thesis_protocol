<template>
    <v-container>
        <v-row>
            <v-col cols="4" offset-md="4">
                <v-card>
                    <v-card-title class="pl-8">Inicio de sesión</v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-form v-model="valid" ref="form">
                                <v-row>
                                    <v-col cols="12 pb-0">
                                        <v-text-field
                                            v-model="email"
                                            :rules="emailRules"
                                            label="Correo electrónico"
                                            outlined
                                            required
                                            autofocus
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                            type="password"
                                            v-model="password"
                                            :rules="passwordRules"
                                            label="Contraseña"
                                            outlined
                                            required
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-container>
                        <v-container class="pb-0 pt-0">
                            <v-row>
                                <v-col cols="10" offset-md="1">
                                    <v-btn
                                        class="primary"
                                        :loading="loading"
                                        v-on:click="signIn"
                                        :disabled="!valid"
                                        tile
                                        block
                                        >Iniciar sesión</v-btn
                                    >
                                </v-col>
                            </v-row>
                        </v-container>
                        <v-container class="pb-0">
                            <v-row>
                                <v-col cols="12" align="center" class="text-body-2 font-weight-medium">
                                    Si aún no estás registrado,
                                    <a href="register" class="text-decoration-none">haz click aquí</a>.
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                valid: false,
                email: '',
                emailRules: [
                    v => !!v || this.requiredFieldErrorMessage,
                    v => /.+@.+/.test(v) || 'Por favor, ingrese un correo electrónico válido.',
                ],
                password: '',
                passwordRules: [v => !!v || this.requiredFieldErrorMessage],
                requiredFieldErrorMessage: 'Este campo es requerido.',
            }
        },

        methods: {
            signIn: function() {
                this.valid = false
                this.loading = true
                axios
                    .post('login', {
                        email: this.email,
                        password: this.password,
                    })
                    .then(function(response) {
                        window.location = 'home'
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
        },
    }
</script>
