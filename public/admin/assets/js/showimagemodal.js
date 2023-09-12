function showImageModal(config){

	this.settings={
		};

		this.files=config.files?config.files:[];

		this.content='';

		this.currentItem='';

		this.class='';

		this.setup=()=>
		{
			this.content='';

			if(this.files.length)
			{
				var i=0;
				for (let v of this.files) {

					
					this.class='';

					if(this.currentItem==v || (this.currentItem=='' && i==0 ))
					{
						this.class='active';
					}

					this.content+=' <div class="carousel-item '+this.class+'"><img class="d-block img-fluid modalImageStyle" src="'+v+'" alt="First slide"></div>';
					i++;
				}
			}

		//	console.log(this.content);

			$('.bs-example-modal-lg').find('#imageModalContent').html(this.content);


		}

		append=(source)=>
		{
             this.files.push(source);
             return this;
		}

		this.show=()=>
		{
			$('.bs-example-modal-lg').modal('show');
		this.setup();

		}

		//this.setup();


}