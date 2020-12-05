<template>
  <div class="home">
    <v-toolbar
      extended
      extension-height="100"
      dark
      prominent
      src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/home.jpg"
    >
      <div class="dropdown menu1">
        <img
          src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/menu.png"
          alt="menu"
          width="8%"
          data-toggle="dropdown"
        />

        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <router-link :to="`/profile`" class="dropdown-item">
            Profile
          </router-link>
          <router-link :to="`/job`" class="dropdown-item">
            Job / Internship
          </router-link>
          <router-link :to="`/forum`" class="dropdown-item">
            Forum
          </router-link>
          <router-link :to="`/directory`" class="dropdown-item">
            Directory
          </router-link>
          <router-link :to="`/directory`" class="dropdown-item">
            Profile
          </router-link>
        </div>
      </div>

      <v-toolbar-title>Coding Academy - ALUMNI</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-export</v-icon>
      </v-btn>
    </v-toolbar>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style>
.background-home {
  background-image: url("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/home.jpg");
  background-size: 100% 300px;
  height: 300px;
}

.menu {
  display: flex;
  width: 50%;
  height: 2rem;
  padding: 0 !important;
  margin: 0 !important;
}

.menu1 {
  padding: 0;
  margin: 0;
}

.btn {
  outline: none !important;
}
</style>