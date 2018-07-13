@extends('layouts.app.main')

@section('titulo','OPERACIONAL')

@section('page-title','Calculadora de Taxas')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">OPERACIONAL</a></li>
        <li class="breadcrumb-item active">Home</li>
    </ol> -->
@endsection

@section('conteudo')

<div class="row">
    <div class="col-12">
    	<div class="card-box">



<form name="form" class="form-custom ng-valid ng-valid-required ng-dirty ng-valid-parse ng-submitted" ng-submit="calcular()" novalidate="">

	<div class="row">

		<div class="col-sm-6">

			<div class="form-group">
				<label for="nome">Valor da Transação
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Digite aqui o valor do produto"></i>
				</label>
				<input type="text" placeholder="" data-a-sign="R$ " class="form-control autonumber" required="required">
			</div>

			<div class="form-group">
				<label for="email">Plano de Recebimento
				<i class="fa fa-question-circle-o"  data-toggle="tooltip" data-placement="top" title="Possibilita o recebimento de todo o valor das vendas parceladas em uma única vez (antecipação) ou em parcelas"></i>
				</label>

				<select name="planosRecebimento" class="form-control" required="required">
					@foreach($maquinasCartoes as $maquinasCartao)
					<option value="{{ $maquinasCartao->id_maquina_cartao }}">{{ $maquinasCartao->id_maquina_cartao }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="telefone">Taxa Débito
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Taxa cobrada por vendas a débito"></i>
				</label>

				<input type="text" name="txDebito" placeholder="" data-a-sign="%" data-p-sign="s" class="form-control autonumber" required="required">

				<input type="text" name="txDebito" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required ng-hide" ng-model="txDebito" ng-required="true" ui-percentage-mask="" ng-hide="tresPrimeirosMeses == true" required="required">

				<input type="text" name="tx3PrimeirosMeses" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-model="tx3PrimeirosMeses" ng-required="true" ui-percentage-mask="" ng-hide="tresPrimeirosMeses == false" required="required">
			</div>

			<div class="form-group">
				<label>
				<input type="checkbox" name="tresPrimeirosMeses" ng-model="tresPrimeirosMeses" class="ng-valid ng-dirty ng-valid-parse ng-touched"> 3 Primeiros Meses
				</label>
			</div>

		</div>

		<div class="col-sm-6">

			<div class="form-group">
				<label for="telefone">Taxa Crédito a Vista
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Taxa cobrada por vendas em crédito à vista"></i>
				</label>
				<input type="text" name="txCreditoVista" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required ng-hide" ng-model="planoRecebimento.txCreditoVista" ng-required="true" ui-percentage-mask="" ng-hide="tresPrimeirosMeses == true" required="required">

				<input type="text" name="tx3PrimeirosMeses" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-model="tx3PrimeirosMeses" ng-required="true" ui-percentage-mask="" ng-hide="tresPrimeirosMeses == false" required="required">
			</div>

			<div class="form-group">
				<label for="telefone">Taxa de Crédito Parcelado
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Taxa cobrada por vendas em crédito parcelado"></i>
				</label>
				<input type="text" name="txCreditoParcelado" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-model="planoRecebimento.txCreditoParcelado" ng-required="true" ui-percentage-mask="" required="required">
			</div>

			<div class="form-group">
				<label for="email">Taxa de Parcelamento
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Taxa cobrada em cada parcela por vendas em crédito parcelado"></i>
				</label>
				<input type="text" name="txParcelamento" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-model="txParcelamento" ng-required="true" ui-percentage-mask="" required="required">
			</div>

			<div class="form-group">
				<label for="email">Taxa nos 3 Primeiros Meses
				<i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Taxa promocional nos 3 primeiros meses no crédito e débito a vista"></i>
				</label>
				<input type="text" name="tx3PrimeirosMeses" class="form-control ng-pristine ng-untouched ng-valid ng-valid-required" ng-disabled="!tresPrimeirosMeses" ng-model="tx3PrimeirosMeses" ng-required="true" ui-percentage-mask="" required="required">
			</div>

			<div class="pull-right">
				<input type="submit" class="btn btn-primary" value="calcular" ng-disabled="form.$invalid || valor == 0.00">
			</div>

		</div>

	</div>

</form>

<p></p>

<div class="table-responsive">
<table class="table table-bordered table-hover text-center" ng-show="resultados">
<thead>
<tr>
<th colspan="2" class="text-center titulo1">PLANO</th>
<th colspan="4" class="text-center titulo2">VENDEDOR ARCANDO COM TODAS AS TAXAS</th>
<th colspan="4" class="text-center titulo4">CLIENTE ARCANDO COM TODAS AS TAXAS</th>
<th colspan="3" class="text-center titulo3">CLIENTE ARCANDO COM A TAXA DE PARCELAMENTO</th>
</tr>
<tr>
<th class="text-center subtitulo1">
<span uib-tooltip="Descrição do plano">Descrição</span>
</th>
<th class="text-center subtitulo1">
<span uib-tooltip="Taxa de intermediação mais a taxa de parcelamento">Taxa Total</span>
</th>
<th class="text-center subtitulo2">
<span uib-tooltip="Parcela sem acréscimo no caso do vendedor arcar com os descontos">Valor da Venda</span>
</th>
<th class="text-center subtitulo2">
<span uib-tooltip="Parcela sem acréscimo no caso do vendedor arcar com os descontos">Valor das Parcelas</span>
</th>
<th class="text-center subtitulo2">
<span uib-tooltip="Valor das taxas de intermediação e de parcelamento">Valor das taxas</span>
</th>
<th class="text-center subtitulo2">
<span uib-tooltip="Valor da compra subtraído da taxa. É o valor que o vendedor irá receber" class="text-center">Valor Líq. à Receber</span>
</th>
<th class="text-center subtitulo4">
<span uib-tooltip="Valor da compra no caso do vendedor repassar as taxas do financiamento ao cliente. Vendedor irá receber o valor integral da transação">Valor da Venda</span>
</th>
<th class="text-center subtitulo4">
<span uib-tooltip="Valor da parcela no caso do vendedor repassar as taxas do financiamento ao cliente">Valor das Parcelas</span>
</th>
<th class="text-center subtitulo4">
<span uib-tooltip="Valor das taxas de intermediação e de parcelamento">Valor das taxas</span>
</th>
<th class="text-center subtitulo4">
<span uib-tooltip="É o valor que o vendedor irá receber">Valor Líq. à Receber</span>
</th>
<th class="text-center subtitulo3">
<span uib-tooltip="Valor da compra para o cliente com juros da taxa de parcelamento" class="text-center">Valor da Venda</span>
</th>
<th class="text-center subtitulo3">
<span uib-tooltip="Valor da parcelada somente com juros da taxa de parcelamento" class="text-center">Valor das Parcelas</span>
</th>
<th class="text-center subtitulo3">
<span uib-tooltip="Valor líquido descontando a taxa de intermediação. É o valor que o vendedor irá receber" class="text-center">Valor Líq. à Receber</span>
</th>
</tr>
</thead>
<tbody>
<!-- ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Débito</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 0% 
											Taxa de Parcelamento: 0%" class="ng-binding">0%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 0,00 
												Valor de desconto da taxa de parcelamento: R$ 0,00" class="ng-binding">R$ 0,00</span>
</td>
<td class="conteudo2 ng-binding">R$ 300,00</td>

<td class="conteudo4 ng-binding">R$ 300,00</td>
<td class="conteudo4 ng-binding">R$ 300,00</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 0,00 
												Valor de juros da taxa de parcelamento: R$ 0,00" class="ng-binding">R$ 0,00</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 300,00</td>
<td class="conteudo3 ng-binding">R$ 300,00</td>
<td class="conteudo3 ng-binding">R$ 300,00</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 1x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 0% 
											Taxa de Parcelamento: 0%" class="ng-binding">0%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 0,00 
												Valor de desconto da taxa de parcelamento: R$ 0,00" class="ng-binding">R$ 0,00</span>
</td>
<td class="conteudo2 ng-binding">R$ 300,00</td>

<td class="conteudo4 ng-binding">R$ 300,00</td>
<td class="conteudo4 ng-binding">R$ 300,00</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 0,00 
												Valor de juros da taxa de parcelamento: R$ 0,00" class="ng-binding">R$ 0,00</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 300,00</td>
<td class="conteudo3 ng-binding">R$ 300,00</td>
<td class="conteudo3 ng-binding">R$ 300,00</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 2x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 4,31%" class="ng-binding">8,5%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 150,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 12,94" class="ng-binding">R$ 25,50</span>
</td>
<td class="conteudo2 ng-binding">R$ 274,50</td>

<td class="conteudo4 ng-binding">R$ 327,87</td>
<td class="conteudo4 ng-binding">R$ 163,93</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 13,74 
												Valor de juros da taxa de parcelamento: R$ 14,13" class="ng-binding">R$ 27,87</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 314,13</td>
<td class="conteudo3 ng-binding">R$ 157,07</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 3x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 5,69%" class="ng-binding">9,88%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 100,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 17,08" class="ng-binding">R$ 29,64</span>
</td>
<td class="conteudo2 ng-binding">R$ 270,36</td>

<td class="conteudo4 ng-binding">R$ 332,89</td>
<td class="conteudo4 ng-binding">R$ 110,96</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 13,95 
												Valor de juros da taxa de parcelamento: R$ 18,94" class="ng-binding">R$ 32,89</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 318,94</td>
<td class="conteudo3 ng-binding">R$ 106,31</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 4x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 7,050%" class="ng-binding">11,24%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 75,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 21,15" class="ng-binding">R$ 33,72</span>
</td>
<td class="conteudo2 ng-binding">R$ 266,28</td>

<td class="conteudo4 ng-binding">R$ 337,99</td>
<td class="conteudo4 ng-binding">R$ 84,50</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 14,16 
												Valor de juros da taxa de parcelamento: R$ 23,83" class="ng-binding">R$ 37,99</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 323,83</td>
<td class="conteudo3 ng-binding">R$ 80,96</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 5x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 8,38%" class="ng-binding">12,57%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 60,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 25,14" class="ng-binding">R$ 37,71</span>
</td>
<td class="conteudo2 ng-binding">R$ 262,29</td>

<td class="conteudo4 ng-binding">R$ 343,13</td>
<td class="conteudo4 ng-binding">R$ 68,63</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 14,38 
												Valor de juros da taxa de parcelamento: R$ 28,75" class="ng-binding">R$ 43,13</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 328,75</td>
<td class="conteudo3 ng-binding">R$ 65,75</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 6x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 9,68%" class="ng-binding">13,87%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 50,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 29,05" class="ng-binding">R$ 41,61</span>
</td>
<td class="conteudo2 ng-binding">R$ 258,39</td>

<td class="conteudo4 ng-binding">R$ 348,31</td>
<td class="conteudo4 ng-binding">R$ 58,05</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 14,59 
												Valor de juros da taxa de parcelamento: R$ 33,72" class="ng-binding">R$ 48,31</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 333,72</td>
<td class="conteudo3 ng-binding">R$ 55,62</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 7x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 10,96%" class="ng-binding">15,15%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 42,86 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 32,89" class="ng-binding">R$ 45,45</span>
</td>
<td class="conteudo2 ng-binding">R$ 254,55</td>

<td class="conteudo4 ng-binding">R$ 353,57</td>
<td class="conteudo4 ng-binding">R$ 50,51</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 14,81 
												Valor de juros da taxa de parcelamento: R$ 38,75" class="ng-binding">R$ 53,57</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 338,75</td>
<td class="conteudo3 ng-binding">R$ 48,39</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 8x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 12,22%" class="ng-binding">16,41%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 37,50 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 36,65" class="ng-binding">R$ 49,23</span>
</td>
<td class="conteudo2 ng-binding">R$ 250,77</td>

<td class="conteudo4 ng-binding">R$ 358,89</td>
<td class="conteudo4 ng-binding">R$ 44,86</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 15,04 
												Valor de juros da taxa de parcelamento: R$ 43,86" class="ng-binding">R$ 58,89</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 343,86</td>
<td class="conteudo3 ng-binding">R$ 42,98</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 9x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 13,450%" class="ng-binding">17,64%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 33,33 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 40,34" class="ng-binding">R$ 52,92</span>
</td>
<td class="conteudo2 ng-binding">R$ 247,08</td>

<td class="conteudo4 ng-binding">R$ 364,25</td>
<td class="conteudo4 ng-binding">R$ 40,47</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 15,26 
												Valor de juros da taxa de parcelamento: R$ 48,99" class="ng-binding">R$ 64,25</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 348,99</td>
<td class="conteudo3 ng-binding">R$ 38,78</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 10x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 14,650%" class="ng-binding">18,84%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 30,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 43,96" class="ng-binding">R$ 56,52</span>
</td>
<td class="conteudo2 ng-binding">R$ 243,48</td>

<td class="conteudo4 ng-binding">R$ 369,64</td>
<td class="conteudo4 ng-binding">R$ 36,96</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 15,49 
												Valor de juros da taxa de parcelamento: R$ 54,15" class="ng-binding">R$ 69,64</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 354,15</td>
<td class="conteudo3 ng-binding">R$ 35,42</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 11x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 15,840%" class="ng-binding">20,03%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 27,27 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 47,52" class="ng-binding">R$ 60,09</span>
</td>
<td class="conteudo2 ng-binding">R$ 239,91</td>

<td class="conteudo4 ng-binding">R$ 375,14</td>
<td class="conteudo4 ng-binding">R$ 34,10</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 15,72 
												Valor de juros da taxa de parcelamento: R$ 59,42" class="ng-binding">R$ 75,14</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 359,42</td>
<td class="conteudo3 ng-binding">R$ 32,67</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados --><tr ng-repeat="resultado in resultados" class="ng-scope">
<td class="conteudo1 ng-binding">Crédito 12x</td>
<td class="conteudo1">
<span uib-tooltip="Taxa de intermediação: 4,19% 
											Taxa de Parcelamento: 17%" class="ng-binding">21,19%</span>
</td>

<td class="conteudo2 ng-binding">R$ 300,00 </td>
<td class="conteudo2 ng-binding">R$ 25,00 </td>
<td class="conteudo2">
<span uib-tooltip="Valor de desconto da taxa de débito: R$ 0,00
												Valor de desconto da taxa de intermediação: R$ 12,57 
												Valor de desconto da taxa de parcelamento: R$ 51,00" class="ng-binding">R$ 63,57</span>
</td>
<td class="conteudo2 ng-binding">R$ 236,43</td>

<td class="conteudo4 ng-binding">R$ 380,66</td>
<td class="conteudo4 ng-binding">R$ 31,72</td>
<td class="conteudo4">
<span uib-tooltip="Valor de juros da taxa de débito: R$ 0,00
												Valor de juros da taxa de intermediação: R$ 15,95 
												Valor de juros da taxa de parcelamento: R$ 64,71" class="ng-binding">R$ 80,66</span></td>
<td class="conteudo4 ng-binding">R$ 300,00</td>

<td class="conteudo3 ng-binding">R$ 364,71</td>
<td class="conteudo3 ng-binding">R$ 30,39</td>
<td class="conteudo3 ng-binding">R$ 287,43</td>
</tr><!-- end ngRepeat: resultado in resultados -->
</tbody>
</table>
</div>







    	</div>
    </div>
</div>

@endsection

@section('footer_page_extra')

<script src="{{asset('assets/app/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
<script src="{{asset('assets/app/plugins/autoNumeric/autoNumeric.js')}}"></script>

<script type="text/javascript">
  jQuery(function($) {
      $('.autonumber').autoNumeric('init');
  });
</script>

@endsection