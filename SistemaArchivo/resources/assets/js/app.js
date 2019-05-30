
new Vue({
	el: '#archivo',
	created: function() {
		this.getNombres();
	},
	data: {
		nombres: []
	},

	methods:{
		getNombres: function() {
			var urlNombres = 'archivos';
			axios.get(urlNombres).then(response => {
				this.nombres = response.data
			});
		}

	}
	
});