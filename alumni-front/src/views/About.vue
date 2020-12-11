<template>
    <div>
        <Header/>
        <v-container>
            <h1> ABOUT </h1>
        </v-container>
        <v-container class="d-flex">
            
            <div class="mr-4">
                <v-img
                    src="../assets/logoCodingAcademy.png"
                    max-height="350"
                    max-width="150"
                ></v-img>
            </div>

            <div>
                <h1>Welcome to the Coding Academy by Epitech Alumni network.</h1>

                <p> Dear Alumni, <br><br>

                    The purpose of the CAA is to promote the welfare of the Coding Academy by Epitech and to establish
                    a mutually beneficial relationship between the Coding Academy by Epitech and its alumni.
                    The CAA helps alumni connect with the school and with fellow graduates through a wealth of online
                    services and alumni events. <br><br>

                    The Coding Academy by Epitech Association (CAA) provides you with a platform dedicated to the current
                    Student and Alumni to facilitate information sharing, networking between students and/or Alumnus just like
                    you used to during your old days at school. The CAA is committed to maintain and enhances a highly engaged,
                    vibrant community of students, Alumni and friends worldwide. <br><br>
                </p>

                <p>Joining the community will grant you access to:</p>

                <ul>
                    <li>Member Directory</li>
                    <li>Private Messaging System</li>
                    <li>Agenda to key events</li>
                    <li>Management of job offers</li>
                </ul>


                <p>Each member has control over the confidentiality of its data and can freely share its access with other
                    users of the platform. <br><br>

                    All contributions and sharing thoughts are most welcome :-) <br>
                </p>
                
                <v-divider class="mx-4"></v-divider>
                    <div class="d-flex justify-center">
                        <p style="font-weight:bold;">Come and join the Coding Academy Alumni community…</p>
                    </div>
                <v-divider class="mx-4"></v-divider>

            </div>
        </v-container>
    </div>
</template>

<script>
import Header from "./../components/Header"

export default {
    name: 'About',

    components: {
        Header
    },

}
</script>

<style>

div h1 {
    font-size: 25px;
    font-weight: bold;
}

li {
    list-style: none;
}
li:before {
    content: "*";
    margin-right: 7px;
    color: #546E7A;
}
</style>