<template>
  <div class="grid">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-4 item">
          <h5 class="title-card">MY PROFILE</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/prof.png"
              alt="profile"
              width="100%"
              height="85%"
              class="profile-item img-item"
            />
            <div class="subtitle-home hoverText">
              <div class="caption">

                   <router-link :to="`/profile`" style="color: inherit">

                <h5 class="subtitle-home">MY PROFILE</h5>
                 </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 item">
          <h5 class="title-card">BUSINESS SECTION</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/recruiters.jpg"
              alt="recruiter"
              width="100%"
              height="85%"
              class="buisiness-item img-item"
            />
            <div class="subtitle-home hoverText">
              <div class="caption">
                   <router-link :to="`/recruter`" style="color: inherit">
                <h5 class="subtitle-home">BUSINESS SECTION</h5>
                          </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 item">
          <h5 class="title-card">DIRECTORY</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/directory.png"
              alt="directory"
              width="100%"
              height="85%"
              class="directory-item img-item"
            />
               <div class="subtitle-home hoverText">
              <div class="caption">

                   <router-link :to="`/directory`" style="color: inherit">

                   <h5 class="subtitle-home">DIRECTORY</h5>
                    </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-around">
        <div class="col-4 item">
        <h5 class="title-card">JOB & INTERNSHIP</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/jobs.png"
              alt="job"
              width="100%"
              height="85%"
              class="job-item img-item"
            />
                <div class="subtitle-home hoverText">
              <div class="caption">

                  <router-link :to="`/job`" style="color: inherit">

                 <h5 class="subtitle-home">JOB & INTERNSHIP</h5>
                  </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 item">
        <h5 class="title-card">FORUM</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/forum.png"
              alt="job"
              width="100%"
              height="85%"
              class="forum-item img-item"
            />
                <div class="subtitle-home hoverText">
              <div class="caption">

                  <router-link :to="`/forum`" style="color: inherit">

                <h5 class="subtitle-home">FORUM</h5>
                 </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 item">
         <h5 class="title-card">EVENT</h5>
          <div class="container-img">
            <img
              src="https://coding-academy-alumni.herokuapp.com/icons/event.png"
              alt="event"
              width="100%"
              height="85%"
              class="event-item img-item"
            />
                <div class="subtitle-home hoverText">
              <div class="caption">

                   <router-link :to="`/event`" style="color: inherit">

                <h5 class="subtitle-home">EVENT</h5>
                 </router-link>
              </div>
            </div>
          </div>
        </div>
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

<style scoped>

.caption a {
     text-decoration: none;
     color: white
}

.item:hover .title-card{
  opacity: 0;
}

.title-card{
  text-align: center;
  transition: 0.5s ease;
  opacity: 1;
}

.hoverText {
  position: absolute;
  top: 0;
  height: 100%;
  transition: 0.5s ease;
  opacity: 0;
  width: 100%;
  text-align: center;
}

.container-img:hover .hoverText{
  opacity: 1;
}

.caption {
  background-color: rgb(0, 0, 0, 0.75);
  color: white;
  font-size: 30px;
  padding-top: 30%;
  border-radius: 6px;
  height: 100%;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-weight: bolder;
}

.container-img {
  background-color: black;
  display: inline-block;
  position: relative;
}

.item {
  margin-top: 5%;
}

.container-img img {
  width: 100%;
}

.img-item {
  opacity: 1;
  transition: opacity 0.3s ease;
  backface-visibility: hidden;
}

.subtitle-home {
  text-align: center;
}

.profile-item {
  border: 1px solid #ddd;
}
</style>