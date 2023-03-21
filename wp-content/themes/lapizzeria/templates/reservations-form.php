<div class="reservation-info">
	<form class="reservation-form" method="post">
		<h2>Make a reservation</h2>
		<div class="field">
			<input type="text" name="name" placeholder="Name" required />
		</div><!--.field-->
		<div class="field">
			<input type="datetime-local" name="date" placeholder="Date" required />
		</div><!--.field-->
		<div class="field">
			<input type="email" name="email" placeholder="E-Mail" required />
		</div><!--.field-->
		<div class="field">
			<input type="tel" name="phone" placeholder="Phone Number" required />
		</div><!--.field-->
		<div class="field">
			<textarea name="message" placeholder="Want to say something..." required></textarea>
		</div><!--.field-->
		<input type="submit" name="submit" class="button" value="Send" />
		<input type="hidden" name="hidden" value="1" />
	</form><!--.reservation-form-->
</div><!--.reservation-info-->