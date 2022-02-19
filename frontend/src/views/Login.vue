<template>
  <v-form @submit.prevent="login">
    <v-container>
      <v-row>

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
        email: null,
        password: null,
      }
    }
  },
  methods: {
    login() {
      Api.post('auth/login', this.form).then(response => {
        if (response.status === 200) {
          // Add token to local storage
          localStorage.setItem("app_token", response.data)
          // Go to home
          this.$router.push('/')
        }
      })
    }
  },
}
</script>
