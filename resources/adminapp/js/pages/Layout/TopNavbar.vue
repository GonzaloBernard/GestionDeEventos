<template>
  <nav
    class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
  >
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-brand">
          
        </div>
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        aria-controls="navigation-index"
        aria-expanded="false"
        aria-label="Toggle navigation"
        @click="toggleSidebar"
        :class="{ toggled: $sidebar.showSidebar }"
      >
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <!-- Collapsable -->
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <v-icon large> mdi-white-balance-sunny </v-icon>
          <v-switch
            @change="setDarkMode"
            class="mt-5 ml-2"
            v-model="$vuetify.theme.dark"
            persistent-hint
          ></v-switch>
          <v-icon large> mdi-weather-night </v-icon>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
    setDarkMode (e) {
      // Usar un modulo vuex con la variable darkMode y no hacer nunca resetState a ese modulo
      /* localStorage.setItem("darkMode", false) */
    }
  },
};
</script>
