<template>
    <button class="btn btn-outline-primary" @click="dialog = true">
        <img
            :src="$base_URL + 'assets/svg/SVG/gmail.svg'"
            class="svg-image"
            alt=""
        />
        Envoyer email
        <v-dialog v-model="dialog" max-width="700">
            <v-card class="carte">
                <h1 class="text-center wave titre">Envoyer un email</h1>
                <v-card-text>
                    <v-text-field
                        label="Email"
                        v-model="email"
                        placeholder="Email de patient"
                        outlined
                    ></v-text-field>
                    <v-textarea
                        name="email"
                        id=""
                        cols="30"
                        rows="10"
                        outlined
                        label="contenu"
                        v-model="contenu"
                        placeholder="Ecrire le contenu de l'email"
                    ></v-textarea>
                </v-card-text>
                <div class="text-center">
                    <v-spacer></v-spacer>
                    <button class="btn btn-success envoyer" @click="sendEmail">
                        Envoyer
                    </button>
                </div>
            </v-card>
        </v-dialog>
    </button>
</template>

<script>
export default {
    props: ["patient"],
    created() {
        this.email = JSON.parse(this.patient).email;
    },
    data() {
        return {
            dialog: false,
            email: "",
            contenu: ""
        };
    },
    methods: {
        async sendEmail() {
            let res = await axios.post("/api/send-mail", {
                email: this.email,
                contenu: this.contenu,
                patient: this.patient
            });
            if ( res ) {
              this.dialog = false
              toastr.success("email envoyer avec succés","Succés")
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.titre {
    margin: 2rem 0;
}
button.envoyer {
    margin-bottom: 1rem;
}
.carte {
    padding: 0.1rem 0.5rem;
}
</style>
