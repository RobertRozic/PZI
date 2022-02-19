<template>
    <v-form @submit.prevent="register">
      <v-container>
        <v-row>
          <v-col
              cols="12"
          >
            <v-text-field
                v-model="form.name"
                label="Ime i prezime"
                required
            ></v-text-field>
          </v-col>

          <v-col
              cols="12"
          >
            <v-text-field
                v-model="form.email"
                label="Email"
                type="email"
                required
            ></v-text-field>
          </v-col>

          <v-col
              cols="12"
          >
            <v-text-field
                v-model="form.password"
                label="Lozinka"
                type="password"
                required
            ></v-text-field>
          </v-col>
          <v-col
              cols="12"
          >
            <v-text-field
                v-model="form.password_confirmation"
                label="Potvrda lozinke"
                type="password"
                required
            ></v-text-field>
          </v-col>
          <v-col
              cols="12"
          >
            <v-btn type="submit">Potvrdi</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
</template>

<script>
import Api from "@/plugins/Api";
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      }
    }
  },
  methods: {
    register() {
      Api.post('auth/register', this.form).then(response => {
        // After register, go to login
        this.$router.push('login')
      })
    }
  },
}
</script>
