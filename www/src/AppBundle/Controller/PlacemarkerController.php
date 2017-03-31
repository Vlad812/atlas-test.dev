<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Placemark;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\View\DefaultView;

class PlacemarkerController extends Controller
{
    /**
     *  Главна страница
     *
     * @Route("/")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request)
    {

        $curPage = $request->query->get('page');

        if (!$curPage) $curPage = 1;

        $repo = $this->getDoctrine()->getRepository('AppBundle:Placemark');

        $res = $repo->findPlaceOrderedByName(($curPage - 1) * 10);

        // Пагинация
        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($repo->queryForPagination()));

        $pagerfanta->setMaxPerPage(10)->setCurrentPage($curPage);

        $routeGenerator = function ($page) {
            return '/?page=' . $page;
        };

        $view = new DefaultView();

        $options = array('proximity' => 3);

        $pagin = $view->render($pagerfanta, $routeGenerator, $options);

        return $this->render('AppBundle:default:table.html.php', ['name' => $res, 'pagin' => $pagin]);
    }


    /**
     *  Новая метка
     *
     * @Route("placemarks/add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addAction(Request $request)
    {

        $data = json_decode($request->query->get('user_data'), true);

        $place = new Placemark();

        $place->setName($data['name']);
        $place->setLat($data['lat']);
        $place->setLon($data['lon']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();

        return $this->json(['msg' => 'Добавлено успешно !',
                'status' => true,
                'id' => $place->getId()]
        );
    }

    /**
     *  Удаление Метки
     *
     * @Route("placemarks/delete/{id}")
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $place = $em->getRepository('AppBundle:Placemark')->find($id);

        if ($place) {

            $em->remove($place);

            $em->flush();

            return $this->json(['msg' => 'Метка удалена успешно !', 'status' => true]);

        } else {

            return $this->json(['msg' => 'Ошибка ! (', 'status' => false]);
        }
    }

    /**
     *  Редактирование Метки
     *
     * @Route("placemarks/edit/{id}")
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editAction(Request $request, $id)
    {
        $data = json_decode($request->query->get('user_data'), true);

        $em = $this->getDoctrine()->getManager();

        $place = $em->getRepository('AppBundle:Placemark')->find($id);

        if ($place) {

            $place->setName($data['name']);

            $place->setLat($data['lat']);

            $place->setLon($data['lon']);

            $em->flush();

            return $this->json(['msg' => 'Метка удалена успешно !', 'status' => true]);
        }

    }


    /**
     *  Задать область поиска
     *
     * @Route("/search")
     */
    public function searchAction()
    {

        return $this->render('AppBundle:default:search_map.html.php');
    }

    /**
     *  Результат  поиска меток
     *
     * @Route("/result")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resultAction(Request $request)
    {
        $lat = $request->query->get('lat');

        $lon = $request->query->get('lon');

        $radius = $request->query->get('radius');

        $res = $this->getDoctrine()
            ->getRepository('AppBundle:Placemark')
            ->findPlacemarks($lat, $lon, $radius);

        $area = ['lat' => $lat, 'lon' => $lon, 'radius' => $radius * 1000];

        return $this->render('AppBundle:default:result.html.php', ['res' => $res, 'area' => $area]);
    }

}
