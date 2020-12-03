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
                <a href ="#">
                    Sign out
                </a>
            </li>
        </template>
        <template v-else>
            <li>
                <router-link
                    :to="{
                        name:'SignIn'
                        }">
                    Sign in
                </router-link>
            </li>
        </template>
    </ul>
</template>

<script>
import { mapGetters} from 'vuex'

export default {
    name:"NavBar",
    computed:{
        ...mapGetters(["authenticated", "user"]),
    },
    
}
</script>

<style scope>

</style>