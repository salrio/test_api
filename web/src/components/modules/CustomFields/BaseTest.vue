<template>
    <div class="example">
        <h3 id="example-5">#5 - Autocomplete with async options</h3>
        <div class="output">Data: {{ select_options.value }}</div>
        <Multiselect v-model="select_options.value" v-bind="select_options">
        </Multiselect>
        <pre v-pre>
            <Multiselect
            v-model="value"
            placeholder="Choose a programming language"
            :filterResults="false"
            :minChars="1"
            :resolveOnLoad="false"
            :delay="0"
            :searchable="true"
            :options="async function(query, API, token) {
            return await fetchLanguages(query, API, authToken) // check JS block for implementation
            }"
            />
        </pre>
    </div>
</template>

<script>
    import Servers from '../../../config/servers.config';
    import Multiselect from '@vueform/multiselect'

    const fetchLanguages = async (query, base_api_url, token) => {
        console.log('token',token);
        if (query.length < 1) {
            query = 'c';
        }

        const response = await fetch(
            base_api_url+'/order/itemlist/'+query,
            {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer '+token,
                }
            }
        );

        

        const data = await response.json(); // Here you have the data that you need

        return data.data.map((item) => {
            return { value: item.id, label: item.name }
        })
    }

    export default {
        components: {
            Multiselect,
        },
        data() {
            return {
                API: Servers.VUE_API_SERVER,
                authToken: null,
                select_options: {
                    value: null,
                    placeholder: 'Choose a programming language',
                    filterResults: false,
                    minChars: 1,
                    resolveOnLoad: false,
                    delay: 0,
                    searchable: true,
                    options: async (query, API, token) => {
                        return await fetchLanguages(query, this.API, this.authToken)
                    }
                },
            }
        },
        mounted(){
            this.authToken = this.$store.state.authToken;
            console.log('mounted authToken', this.authToken);
        }
    }

    
</script>

<style src="@vueform/multiselect/themes/default.css">
    
</style>