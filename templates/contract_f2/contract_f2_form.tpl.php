<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Sutartys</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Sutarties redagavimas"; else echo "Nauja sutartis"; ?></li>
	</ol>
</nav>

<?php if($formErrors != null) { ?>
	<div class="alert alert-danger" role="alert">
		Neįvesti arba neteisingai įvesti šie laukai:
		<?php 
			echo $formErrors;
		?>
	</div>
<?php } ?>


<form action="" method="post" class="d-grid gap-3">

	<h4 class="mt-3">Sutarties informacija</h4>
  	
	<div class="form-group">
		<label for="nr">Numeris<?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="nr" <?php if(isset($data['editing'])) { ?> readonly="readonly" <?php } ?> name="nr" class="form-control" value="<?php echo isset($data['nr']) ? $data['nr'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="sutarties_data">Data<?php echo in_array('sutarties_data', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="sutarties_data" name="sutarties_data" class="form-control datepicker" value="<?php echo isset($data['sutarties_data']) ? $data['sutarties_data'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="fk_klientas">Klientas<?php echo in_array('fk_klientas', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_klientas" name="fk_klientas" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame klientus
				$customers = $customersObj->getCustomersList();
				foreach($customers as $key => $val) {
					$selected = "";
					if(isset($data['fk_klientas']) && $data['fk_klientas'] == $val['asmens_kodas']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['asmens_kodas']}'>{$val['vardas']} {$val['pavarde']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="fk_darbuotojas">Darbuotojas<?php echo in_array('fk_darbuotojas', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_darbuotojas" name="fk_darbuotojas" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame vartotojus
				$employees = $employeesObj->getEmplyeesList();
				foreach($employees as $key => $val) {
					$selected = "";
					if(isset($data['fk_darbuotojas']) && $data['fk_darbuotojas'] == $val['tabelio_nr']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['tabelio_nr']}'>{$val['vardas']} {$val['pavarde']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="nuomos_data_laikas">Nuomos data ir laikas<?php echo in_array('nuomos_data_laikas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="nuomos_data_laikas" name="nuomos_data_laikas" class="form-control datetimepicker" value="<?php echo isset($data['nuomos_data_laikas']) ? $data['nuomos_data_laikas'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="planuojama_grazinimo_data_laikas">Planuojama grąžinti<?php echo in_array('planuojama_grazinimo_data_laikas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="planuojama_grazinimo_data_laikas" name="planuojama_grazinimo_data_laikas" class="form-control datetimepicker" value="<?php echo isset($data['planuojama_grazinimo_data_laikas']) ? $data['planuojama_grazinimo_data_laikas'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="faktine_grazinimo_data_laikas">Grąžinta<?php echo in_array('faktine_grazinimo_data_laikas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="faktine_grazinimo_data_laikas" name="faktine_grazinimo_data_laikas" class="form-control datetimepicker" value="<?php echo isset($data['faktine_grazinimo_data_laikas']) ? $data['faktine_grazinimo_data_laikas'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="busena">Būsena<?php echo in_array('busena', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="busena" name="busena" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame būsenas
				$states = $contractsObj->getContractStates();
				foreach($states as $key => $val) {
					$selected = "";
					if(isset($data['busena']) && $data['busena'] == $val['id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id']}'>{$val['name']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="kaina">Nuomos kaina<?php echo in_array('kaina', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="kaina" name="kaina" class="form-control" value="<?php echo isset($data['kaina']) ? $data['kaina'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="bendra_kaina">Bendra kaina su paslaugomis<?php echo in_array('bendra_kaina', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="bendra_kaina" name="bendra_kaina" class="form-control" value="<?php echo isset($data['bendra_kaina']) ? $data['bendra_kaina'] : ''; ?>">
	</div>

	<h4 class="mt-3">Automobilio informacija</h4>

	<div class="form-group">
		<label for="fk_automobilis">Automobilis<?php echo in_array('fk_automobilis', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_automobilis" name="fk_automobilis" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame automobilius
				$cars = $carsObj->getCarList();
				foreach($cars as $key => $val) {
					$selected = "";
					if(isset($data['fk_automobilis']) && $data['fk_automobilis'] == $val['id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id']}'>{$val['valstybinis_nr']} - {$val['marke']} {$val['modelis']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="fk_paemimo_vieta">Paėmimo vieta<?php echo in_array('fk_paemimo_vieta', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_paemimo_vieta" name="fk_paemimo_vieta" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame aikšteles
				$parkingLots = $contractsObj->getParkingLots();
				foreach($parkingLots as $key => $val) {
					$selected = "";
					if(isset($data['fk_paemimo_vieta']) && $data['fk_paemimo_vieta'] == $val['id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="pradine_rida">Rida paimant<?php echo in_array('pradine_rida', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="pradine_rida" name="pradine_rida" class="form-control" value="<?php echo isset($data['pradine_rida']) ? $data['pradine_rida'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="degalu_kiekis_paimant">Degalų kiekis paimant<?php echo in_array('degalu_kiekis_paimant', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="degalu_kiekis_paimant" name="degalu_kiekis_paimant" class="form-control" value="<?php echo isset($data['degalu_kiekis_paimant']) ? $data['degalu_kiekis_paimant'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="fk_grazinimo_vieta">Grąžinimo vieta<?php echo in_array('fk_grazinimo_vieta', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_grazinimo_vieta" name="fk_grazinimo_vieta" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame aikšteles
				$parkingLots = $contractsObj->getParkingLots();
				foreach($parkingLots as $key => $val) {
					$selected = "";
					if(isset($data['fk_grazinimo_vieta']) && $data['fk_grazinimo_vieta'] == $val['id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="galine_rida">Rida grąžinus<?php echo in_array('galine_rida', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="galine_rida" name="galine_rida" class="form-control" value="<?php echo isset($data['galine_rida']) ? $data['galine_rida'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="dagalu_kiekis_grazinus">Degalų kiekis grąžinus<?php echo in_array('dagalu_kiekis_grazinus', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="dagalu_kiekis_grazinus" name="dagalu_kiekis_grazinus" class="form-control" value="<?php echo isset($data['dagalu_kiekis_grazinus']) ? $data['dagalu_kiekis_grazinus'] : ''; ?>">
	</div>

	<h4 class="mt-3">Papildomos paslaugos</h4>

	<div class="row w-75">
		<div class="formRowsContainer column">
			<div class="row headerRow<?php if(empty($data['uzsakytos_paslaugos']) || sizeof($data['uzsakytos_paslaugos']) == 1) echo ' d-none'; ?>">
				<div class="col-6">Paslauga</div>
				<div class="col-1">Kaina</div>
				<div class="col-1">Kiekis</div>
				<div class="col-4"></div>
			</div>
			<?php
				if(!empty($data['uzsakytos_paslaugos']) && sizeof($data['uzsakytos_paslaugos']) > 0) {
					foreach($data['uzsakytos_paslaugos'] as $key => $orderedService) {

						$disabledAttr = "";
						if($key === 0) {
							$disabledAttr = "disabled='disabled'";
						}

						$kaina = '';
						if(isset($orderedService['kaina']) ) {
							$kaina = $orderedService['kaina'];
						}

						$kiekis = '';
						if(isset($orderedService['kiekis']) ) {
							$kiekis = $orderedService['kiekis'];
						}

					?>
						<div class="formRow row col-12 <?php echo $key > 0 ? '' : 'd-none'; ?>">
							<div class="col-6">
								<select class="elementSelector form-select form-control" name="paslauga[]" <?php echo $disabledAttr; ?>>
									<?php
										$allServices = $servicesObj->getServicesList();
										foreach($allServices as $service) {
											echo "<optgroup label='{$service['pavadinimas']}'>";
											$prices = $servicesObj->getServicePrices($service['id']);
											foreach($prices as $price) {
												$selected = "";
												if(isset($orderedService['fk_kaina_galioja_nuo']) ) {
													if($orderedService['fk_kaina_galioja_nuo'] == $price['galioja_nuo'] && $orderedService['fk_paslauga'] == $price['fk_paslauga']) {
														$selected = " selected='selected'";
													}
												}
												echo "<option{$selected} value='{$price['fk_paslauga']}#{$price['galioja_nuo']}}'>{$service['pavadinimas']} {$price['kaina']} EUR (nuo {$price['galioja_nuo']})</option>";
											}
										}
									?>
								</select>
							</div>

							<div class="col-1"><input type="text" name="paslaugos_kaina[]" class="form-control" value="<?php echo $kaina; ?>" <?php echo $disabledAttr; ?> /></div>
							<div class="col-1"><input type="text" name="paslaugos_kiekis[]" class="form-control" value="<?php echo $kiekis; ?>" <?php echo $disabledAttr; ?> /></div>
							<div class="col-4"><a href="#" onclick="return false;" class="removeChild">šalinti</a></div>
						</div>
					<?php 
					}
				}
					?>
		</div>
		<div class="w-100">
			<a href="#" class="addChild">Pridėti</a>
		</div>
	</div>

	<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Išsaugoti">
</form>