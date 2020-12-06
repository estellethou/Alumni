<template>
  <div class="grid">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-4 item">
          <h5 class="subtitle">My Profile</h5>
          <img
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/profile.png"
            alt="menu"
            width="90%"
            class="profile-item"
          />
        </div>
        <div class="col-4 item">
          <h5 class="subtitle">Buisiness Section</h5>
                    <img
            src="http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/icons/recruiter.jpg"
            alt="recruiter"
            width="90%"
            class="profile-item"
          />
        </div>
        <div class="col-4 item"><h5 class="subtitle">Directory</h5></div>
      </div>

      <div class="row justify-content-around">
        <div class="col-4 item"><h5 class="subtitle">Job & Internship</h5></div>
        <div class="col-4 item"><h5 class="subtitle">Forum</h5></div>
        <div class="col-4 item"><h5 class="subtitle">Event</h5></div>
      </div>

    </div>
  </div>
</template>


<script>
export default {
  name: "Grid",

  components: {},
};
</script>

<style>
.item {
  margin: 0;
}

.subtitle{
    text-align: center;
}
</style>