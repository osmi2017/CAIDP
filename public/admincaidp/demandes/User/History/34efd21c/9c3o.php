<?php

/*
|--------------------------------------------------------------------------
| Web Routesenregistrer
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Notifications\NewAccount;
use App\Http\Controllers\Auth\CaidpRegisterController;

// Route::get('/', function () {
// 	// $pass = "azerty";
// 	// $User = \App\User::find(Auth()->user()->id);
// 	// $User->notify(new NewAccount($pass));
//     // return view('welcome');
//     return redirect()->route('login');

//     // return view('pdf.decision');
// });
//Route::get('/', 'MainDemandeController@calculeDemandeDelais');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*============================ ROUTE INSTITUTIONS =====================================*/ 

/*======================== END ROUTE INSTITUTIONS =============================*/ 
Route::group(['namespace'=>'Organisme'], function(){
		route::get('details-demande/{n}', function(){
			return view('institutions.informaticiens.demandeDetails');
		})->name('institutions.inform.demandeDetails');
		route::get('formulaire-demande/{n}', function(){
			return view('institutions.informaticiens.ajouterFichier');
		})->name('institutions.inform.formFichier');
		route::get('proroger-delais-de-la-demande/{n}', function(){
			return view('institutions.informaticiens.prorogerDelais');
		})->name('institutions.inform.prorogerDelais');
		route::get('ajouter-une-decision/{n}', function(){
			return view('institutions.informaticiens.decision');
		})->name('institutions.inform.decision');

		route::post('enregistrer-requerant', 'DemandeController@ajaxSave')->name('ajaxSave');
		route::get('find-email', 'DemandeController@emailReq')->name('emailReq');
		route::get('find-orga', 'DemandeController@checkOrga')->name('checkOrga');
		route::get('find-respoInfo', 'DemandeController@respoInfo')->name('respoInfo');
		route::post('enregistrer-decison', 'DemandeController@ajaxSaveDecision')->name('ajaxSaveDecision');

		route::post('prev', 'DemandeController@prevDecision')->name('prevDecision');

		route::post('enregistrer-demande', 'DemandeController@ajaxSaveDemande')->name('ajaxSaveDemande');
		route::post('enregistrer-documents', 'DemandeController@ajaxSaveDocs')->name('ajaxSaveDocs');
		route::get('check-delais', 'DemandeController@checkDedelaisDemande')->name('checkDedelaisDemande');
		route::get('check-delais-prorogation', 'DemandeController@checkDedelaisProrogation')->name('checkDedelaisDemandeProro');
		route::get('demande/ajouter-une-demande/{n?}', 'DemandeController@DemandeForm')->name('institutions.inform.ajoutDemande')->where('n', '[0-9]+');
		route::get('demande/', 'DemandeController@index')->name('institutions.inform.listeDemande');
		route::post('enregistrer-une-demande', 'DemandeController@enregistrerDemande')->name('institutions.inform.saveDemande');
		route::get('Documents/', 'DocumentController@index')->name('Documents.index');
		route::get('liste-saisines/', 'SaisineController@index')->name('MySaisines');
		route::get('ajouter-saisines/', 'SaisineController@create')->name('createSaisines');
		route::get('saisine-detail/{n}', 'SaisineController@show')->name('MySaisines.detail');
		route::get('/check-saisine/', 'SaisineController@checkSaisine');
		route::post('/save-saisine/', 'SaisineController@store')->name('saisines.store');
		route::get('Documents/ajouter-document/', 'DocumentController@create')->name('Documents.create');
		route::post('Documents/enregistrer-document/', 'DocumentController@store')->name('Documents.store');
		route::get('Documents/detail/{n}', 'DocumentController@detail')->name('Documents.detail');
		route::get('generer-rapport', 'RapportController@formulaire')->name('genererRapport');
		route::post('modifier-rapport/', 'RapportController@modifier')->name('genererRapport.modifier');
		route::post('modifier-rapport-motif/', 'RapportController@modifierMotif')->name('genererRapport.modifier');
		route::get('supprimer-motif/{n}', 'RapportController@Supprimer')->name('Supp.modifier');

		route::post('imprimer/', 'DemandeController@imprimer')->name('imprimer');
		route::get('impression/', 'DemandeController@impression')->name('impression');

		route::get('imprimer-rapport/{n?}', 'RapportController@imprimerRapport')->name('imprimerRapport');


});



		route::get('utilisateurs', 'ResponsableController@index')->name('Responsable.index');
		route::get('utilisateurs/nouveau/{n?}', 'ResponsableController@nouveau')->name('Responsable.nouveau');
		route::get('utilisateurs/param/{n}', 'ResponsableController@nouveau')->name('Responsable.param');
		route::get('utilisateurs/organisme/', 'ResponsableController@organisme')->name('Responsable.organisme');
		route::post('utilisateurs/organisme/save', 'ResponsableController@organismeSave')->name('Responsable.organismeSave');
		route::post('utilisateurs/enregistrer/', 'ResponsableController@store')->name('Responsable.store');
		route::get('utilisateurs/modifier/{n}', 'ResponsableController@create')->name('Responsable.edit');
		route::get('utilisateurs/detail/{n}', 'ResponsableController@create')->name('Responsable.detail');
		route::delete('utilisateurs/supprimer/{n}', 'ResponsableController@delete')->name('Responsable.delete');
		route::get('utilisateurs/type-de-validation', 'ResponsableController@typeValidForm')->name('Responsable.typeValidForm');
		route::post('utilisateurs/save-validation', 'ResponsableController@saveValidation')->name('Responsable.saveValidation');
		
		route::post('utilisateurs/save-validation', 'ResponsableController@saveValidation')->name('Responsable.saveValidation');




// Route::resource('/utilisateurs', 'UserController');
// Route::resource('/utilisateurs', 'UserController');
route::post('valider-decision', 'DecisionController@confirmeDecision')->name('confirmeDecision');
route::get('previsualiser/', 'DecisionController@previewPDF')->name('previewPDF');
route::get('/generer-passe/', 'InscriptionController@genererMotDePasse')->name('emailReq');
route::get('/find-qualite-respo/', 'InscriptionController@findQualiterespo')->name('findQualiterespo');
route::get('/verification-email/', 'InscriptionController@emailChecker')->name('emailReq');
Route::get('/organisme/inscription/','InscriptionController@organisme')->name('inscriptionOrga');
Route::get('/organisme/', function(){
	return redirect()->route('home');
});
Route::post('organisme-save','InscriptionController@saveInscription')->name('saveOrga');



// ============================================= FRONT ROUTE ==================================================
Route::get('/', 'AccueilController@index')->name('Accueil');
Route::get('ajax-search', 'AccueilController@ajaxInfo')->name('ajaxInfo');
Route::get('liste-responsables', 'AccueilController@listRespo')->name('listRespo');
Route::get('organisme-search', 'AccueilController@findOrganisme')->name('findOrganisme');
Route::get('organisme-publics/{n}', 'AccueilController@organismePublics')->name('organismePublics');
Route::get('find-organisme/', 'AccueilController@searchOrganisme')->name('searchOrganisme');
Route::get('resultat-recherche', 'AccueilController@resulatRecherche')->name('resultatRecherche');

Route::get('formulaire-demande/', 'AccueilController@formulaireDemande')->name('formulaireDemande');

Route::post('inscription', 'ConnexionController@Inscription')->name('connexion.Inscription');
Route::post('connexion', 'ConnexionController@Connexion')->name('connexion.Login');
Route::get('deconnexion', 'ConnexionController@deconnexion')->name('deconnexion');
//Route::get('/caidpregister', [CaidpRegisterController::class, 'show']);

Route::delete('/documents/{file}',  'DemandeController@')->name('documents.destroy');


Route::get('sign', function(){
	return view('front.sign');
});






/*======================== ROUTE REQUERANT =================================*/ 
Route::group(['prefix'=>'requerant'], function(){
	route::get('/', function(){
		return redirect()->route('requerant.index');
	})->name('requerant.index');
	route::get('/accueil', 'UsagerController@index')->name('requerant.index');
	route::get('/profil', 'UsagerController@profil')->name('requerant.profil');
	route::post('/updateProfil', 'UsagerController@updateProfil')->name('requerant.updateProfil');
	route::get('/faire-une-demande', 'UsagerController@faireDemande')->name('requerant.faireDemande');
	route::post('/enregistrer-une-demande', 'UsagerController@saveDemande')->name('requerant.saveDemande');		
	route::get('/detail-demande/{n}', 'UsagerController@seeDemande')->name('requerant.seeDemande');	
	route::get('/notifications/', 'UsagerController@notificationReq')->name('requerant.notitif');	
	route::get('/formulaire-saisine{n?}', 'UsagerController@formSaisine')->name('requerant.formSaisine');
	route::get('/check-saisine/', 'UsagerController@checkSaisine')->name('requerant.checkSaisine');	
	route::post('/save-saisine/', 'UsagerController@saveSaisine')->name('requerant.saveSaisine');	
	route::get('/liste-de-saisines/', 'UsagerController@listSaisine')->name('requerant.saisines');	
	route::get('/telechargerNotification/{n}', 'UsagerController@telechargerNotification')->name('telechargerNotification');	
	route::get('/detail-saisine/{n}', 'UsagerController@seeSaisine')->name('requerant.seeSaisine')->where('n', '[0-9]+');		
	// route::get('/detail-notification/{n}', 'UsagerController@detailNotification')->name('requerant.notitifDetail')->where('n', '[A-Za-z0-9]+');		
});	

/*==========================END ROUTE REQUERANT ===================================*/ 



	

/*======================== ROUTE ADMIN =================================*/ 
Route::group(['prefix'=>'administrateurs'], function(){
	route::get('/', function(){
		return redirect()->route('admin.Home');
	})->name('admin.Home');
	route::get('accueil', 'adminController@index')->name('admin.Home');
	route::get('param/{n?}', 'ParamController@show')->name('admin.show');
	route::get('utilisateurs/nouveau', 'ParamController@nouveau')->name('admin.nouveau');
	route::get('utilisateurs/', 'ParamController@index')->name('admin.userList');
	route::post('param/update', 'ParamController@update')->name('admin.update');
	route::get('previsualiser', 'adminController@previsualiser')->name('admin.previsualiser');
	route::post('/saveSaisine', 'adminController@saveSaisine');	
	route::post('/saveImageFile', 'adminController@saveImageFile');	
	route::post('/saveFacilitation', 'adminController@saveFacilitation')->name('saveFacilitation');	
	route::post('/saveContentieu', 'adminController@saveContentieu');	
	route::get('/supprimer-contentieu', 'adminController@supContentieu');	
	route::get('/archived', 'adminController@archived');	
	route::get('/trashFile', 'adminController@trashFile');	
	route::post('/saveDecision', 'adminController@saveDecision');	
	route::get('/finaliser-saisine', 'adminController@finaliseSaisine');	
	route::get('/supprimer-facilitation', 'adminController@supprimerFacilitation');	
	route::get('nouvelle-saisine-{n?}', 'adminController@newSaisine')->name('admin.newSaisine');		
});	

/*==========================END ROUTE ADMIN ===================================*/ 
	route::get('crone', 'croneController@allDemande');


// ======================= SOLO ================================================
//ROute::group(['prefix'=>'maintenances', 'namespace'=>'Maintenance'], function(){
//	route::get('/', 'maintenancesController@index')->name('maintenance.Index');
//	route::post('/', 'maintenancesController@save')->name('maintenance.Save');
//});