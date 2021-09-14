<template>
    <div>
        <mavon-editor language="en-US" v-model="solution" :editable="editable"/>
        <div v-if="editable" class="my-3 flex justify-end content-center">
            <span class="align-middle mr-1">
                Can be replicated:
            </span> 
            <select v-model="canBeReplicated" class="bg-transparent px-4 py-1 rounded-l-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
                <option v-for="option in options" :key="option">
                    {{ option }}
                </option>
            </select>
            <button @click="save()" class="px-4 py-1 rounded-r-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
                Save
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        createRoute: {
            type: String
        },
        show: {
            type: String
        },
        value: {
            type: String,
            default: "Write your solution..."
        }
    },
    data() {
        return {
            solution: this.value,
            canBeReplicated: "yes",
            options: [
                'yes',
                'no',
                'maybe'
            ]
        }
    },
    mounted() {
        console.log(342);
        this.solution = this.value;
        console.log(this.solution);
    },
    methods: {
        save: async function() {
            let response = await axios.post(this.createRoute, {
                solution: this.solution,
                can_be_repicated: this.canBeReplicated,
            });

            window.location.href = this.createRoute + "/" + response.data.id;
        }  
    },
    computed: {
        editable: function () {
            return this.show == 'true';
        }
    }

}
</script>

<style>

</style>