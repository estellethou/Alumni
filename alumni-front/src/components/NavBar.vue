<template>
    <ul>
        <li>
            <router-link
                :to="{
                    name:'Home'
                    }">
                Home
            </router-link>
        </li>
        <template v-if="authenticated">
            <li>
                Welcome {{user.firstname}}
            </li>
            <li>
                <router-link
                    :to="{
                        name:'Dashboard'
                        }">
                    Dashboard
                </router-link>
            </li>
            <li>
                <a href ="#" @click.prevent="signOutButton">
                    Sign out
                </a>
            </li>
        </template>
        <template v-else>
            <li>
                <router-link
                    :to="{
                        name:'Login'
                        }">
                    Login / Register
                </router-link>
            </li>
        </template>
    </ul>
</template>

<script>
import { mapGetters, mapActions} from 'vuex'

export default {
    name:"NavBar",
    computed:{
        ...mapGetters(["authenticated", "user"]),
    },

    methods: {
    ...mapActions(["signOut"]),

    signOutButton() {
        this.signOut().then(() => {
            this.$router.replace({
                name: 'Home'
            })
        })
    }
    }
}
</script>

<style scope>

</style>